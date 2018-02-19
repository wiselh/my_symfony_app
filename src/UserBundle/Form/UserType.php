<?php

namespace UserBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //        buildForm
        $builder->add('username', TextType::class, array('label' => 'Username', 'required' => true))
            ->add('email', EmailType::class, array('label' => 'Email', 'required' => true))
            ->add('password',RepeatedType::class, array(
                'type'=> PasswordType::class,
                'label' => 'Password',
                'required' => true
            ))
            ->add('save', SubmitType::class);
//        ->add('submit', SubmitType::class, [
//        'attr'=>[
//            'class' => 'btn btn-success'
//        ]]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_user';
    }


}
