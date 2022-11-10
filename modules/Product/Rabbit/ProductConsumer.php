<?php

namespace Modules\Product\Rabbit;

use Doctrine\ORM\EntityManagerInterface;
use Modules\Product\Entity\Product;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;

class ProductConsumer implements ConsumerInterface
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function execute(AMQPMessage $msg)
    {
        $productId = json_decode($msg->body, true);

        /** @var Product $product */
        $product = $this->entityManager->getRepository(Product::class)
            ->findOneBy(['id' => $productId]);

        $product->setUpdatedAt(new \DateTime());
        $this->entityManager->flush();

        $this->logger->info(printf('Product #id = %d', $productId));
    }
}