<?php
namespace App\Form\Blog;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('Firstname',TextType::class,
          [
             "required" => true
              ])
          ->add('Lastname', TextType::class)
          ->add('Valider',SubmitType::class)
          ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class'=> Auteur::class
       ]);
    }


}