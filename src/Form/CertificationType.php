<?php

namespace App\Form;

use App\Repository\FiliereRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class CertificationType
 */
class CertificationType extends AbstractType
{
    /** @var \App\Repository\FiliereRepository */
    private $filiereRepository;

    /**
     * @param \App\Repository\FiliereRepository $filiereRepository
     */
    public function __construct(FiliereRepository $filiereRepository)
    {
        $this->filiereRepository = $filiereRepository;
    }

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('certification', TextType::class, ['label' => 'certification_visee'])
            ->add('filiere', ChoiceType::class, [
                'required' => false,
                'choices' => $this->filiereRepository->findAll(),
                'placeholder' => 'choisissez',
                'label' => 'certification_visee_concerne_seulement',
                'choice_label' => 'filiere',
                'choice_translation_domain' => false,
            ]);
    }

    /**
     * @inheritdoc
     */
    public function getBlockPrefix()
    {
        return 'app_bundle_certification_type';
    }
}
