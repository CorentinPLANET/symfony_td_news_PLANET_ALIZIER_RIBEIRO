<?php

namespace App\Form;

use App\Entity\Matine;
use App\Entity\Promo;
use App\Entity\Schedule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cours')
            ->add('professeur')
            ->add('salle')
            ->add('specialite')
            ->add('dates')
            ->add('matine', EntityType::class, [
                'class' => Matine::class,
                'choice_label' => 'name'
            ])
            ->add('promo', EntityType::class, [
                'class' => Promo::class,
                'choice_label' => 'name',
            ])
        ;
    }

	public function configureOptions(OptionsResolver $resolver): void
	{
		$resolver->setDefaults([
			'data_class' => Schedule::class,
		]);
	}
}
