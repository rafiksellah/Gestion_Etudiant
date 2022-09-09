<?php

namespace App\Form;

use App\Entity\Infos;
use App\Entity\Country;
use App\Entity\Program;
use App\Entity\University;
use App\Entity\Nationality;
use App\Entity\DomaineDetude;
use App\Entity\StuedntResidance;
use App\Entity\LocationUniversity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class InfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rentalProperty')
            ->add('desiredDate',DateTimeType::class, [
                'widget' => 'single_text',
                // 'html5' => false,
                'label' => false,
            ])
            ->add('desiredTimeLease')
            ->add('numberTerms')
            ->add('surname')
            ->add('firstname')
            ->add('birthname')
            ->add('sex', ChoiceType::class, [
                'label' => false,
                'choices'  => [
                    'Male' => 'male',
                    'Female' => 'female',
                ],
                'expanded'  => true,
                'multiple'  => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add( 'birthday', DateTimeType::class, [
                'widget' => 'single_text',
                // 'html5' => false,
                'label' => false,
            ])
            ->add('email')
            ->add('repeatEmail')
            ->add('address')
            ->add('zib')
            ->add('city')
            ->add('phoneHome')
            ->add('phone')
            ->add('permissionStudy',FileType::class,[
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],

            ])
            ->add('homeCollege')
            ->add('remarque1')
            ->add('addInfo')
            ->add('country', EntityType::class, array(
                'attr' => ['class' => 'form-control'],
                'class' => Country::class,
                'multiple' => false
            ))
            ->add('domaineDetude', EntityType::class, array(
                'attr' => ['class' => 'form-control'],
                'class' => DomaineDetude::class,
                'multiple' => false
            ))
            ->add('locationUniversity', EntityType::class, array(
                'attr' => ['class' => 'form-control'],
                'class' => LocationUniversity::class,
                'multiple' => false
            ))
            ->add('nationality', EntityType::class, array(
                'attr' => ['class' => 'form-control'],
                'class' => Nationality::class,
                'multiple' => false
            ))
            ->add('studentResidance', EntityType::class, array(
                'attr' => ['class' => 'form-control'],
                'class' => StuedntResidance::class,
                'multiple' => false
            ))
            ->add('program', EntityType::class, array(
                'attr' => ['class' => 'form-control'],
                'class' => Program::class,
                'multiple' => false
            ))
            ->add('university', EntityType::class, array(
                'attr' => ['class' => 'form-control'],
                'class' => University::class,
                'multiple' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Infos::class,
        ]);
    }
}
