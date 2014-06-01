<?php

namespace Tech\TBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class ForgotpassType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
          $required = array( 
            'required' => true
        );
        $builder
            ->add('vcorreoEmail','text',array ('constraints'=>  array(
                new Email(array('message'=> 'Introduzca un correo válido.')),
                new Length(array('maxMessage' => 'El correo no debe tener mas de 40 caracteres.','max' => 40))),
                'invalid_message' => 'El valor de Correo que introdujo no es correcto.'
                . '. Ej. micorreo@gmail.com'),$required)
            ->add('pkIci','text',array ('constraints'=>  array(
                new Length(array('maxMessage' => 'Su usuario no debe exceder 8 digitos.',
                    'max' => 8,'min' => 6,'minMessage' => 'Su usuario debe tener al menos 6 digitos')),
                    new Regex(array( 'pattern'   => '/\d/', 'match'     => true,
                    'message'   => 'Su cédula no debe contener letras, caracteres'
                    . ' especiales o más de 8 dígitos')) ))
                    ,$required);
    }
    
    /*
      public function getDefaultOptions(array $options)
    {
        $notBlankMsg = array('message' => 'No debe haber ningun campo vacio');

        $collectionConstraint = new Collection(array(            
            'vcorreoEmail'     => (array(
                new NotBlank($notBlankMsg),
                new Email())),
                new MaxLength(array('limit' => 40)),
            'pkIci'      => (array(new NotBlank($notBlankMsg),
                new MaxLength(array('limit' => 8)),
                new MinLength(array('limit' => 6)))),
                new Regex(array(
                    'pattern'   => '/\d/',
                    'match'     => true,
                    'message'   => 'Su cédula no debe contener letras, caracteres'
                    . ' especiales o más de 8 dígitos'
                )),                        
        ));        

        return array(
            'validation_constraint' => $collectionConstraint,
            'show_legend'           => false,
            'render_fieldset'       => false
        );
    }
*/
  
    /**
     * @return string
     */
    public function getName()
    {
        return 'tech_tbundle_forgotpass';
    }
}
