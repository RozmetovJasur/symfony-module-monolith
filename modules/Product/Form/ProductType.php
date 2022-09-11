<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 06.09.2022
 * Time: 18:43
 */

namespace Modules\Product\Form;

use Modules\Product\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('price', PriceType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => "Save",
                'row_attr' => [
                    'class' => "col-6 pull-left text-start",
                ],
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Product::class
            ]);
    }
}