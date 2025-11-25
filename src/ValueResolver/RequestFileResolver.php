<?php

namespace App\ValueResolver;

use App\Attribute\RequestImageBody;
use App\DTO\ImageDTO;
use App\Exception\RequestBodyConvertException;
use App\Exception\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestFileResolver implements ValueResolverInterface
{
    public function __construct(
        private readonly ValidatorInterface $validator
    )
    {
    }

    private function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return count($argument->getAttributes(RequestImageBody::class, ArgumentMetadata::IS_INSTANCEOF)) > 0;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        if (!$this->supports($request, $argument)) {
            return [];
        }
        /**
         * @var $attribute RequestImageBody
         */
        $attribute = $argument->getAttributes(RequestImageBody::class, ArgumentMetadata::IS_INSTANCEOF)[0];
        $data = $request->files->get($attribute->getFilaName());

        try {
            $data = new ImageDTO($data);
        } catch (ExceptionInterface $e) {
            throw new RequestBodyConvertException();
        }

        $errors = $this->validator->validate($data);
        if (count($errors) > 0) {
            throw new ValidationException($errors);
        }

        return [$data];
    }
}