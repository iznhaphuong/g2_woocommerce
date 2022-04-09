<?php
namespace MailPoetVendor\Symfony\Component\Validator\Context;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Validator\Constraint;
use MailPoetVendor\Symfony\Component\Validator\ConstraintViolationListInterface;
use MailPoetVendor\Symfony\Component\Validator\Mapping;
use MailPoetVendor\Symfony\Component\Validator\Mapping\MetadataInterface;
use MailPoetVendor\Symfony\Component\Validator\Validator\ValidatorInterface;
use MailPoetVendor\Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;
interface ExecutionContextInterface
{
 public function addViolation($message, array $params = []);
 public function buildViolation($message, array $parameters = []);
 public function getValidator();
 public function getObject();
 public function setNode($value, $object, MetadataInterface $metadata = null, $propertyPath);
 public function setGroup($group);
 public function setConstraint(Constraint $constraint);
 public function markGroupAsValidated($cacheKey, $groupHash);
 public function isGroupValidated($cacheKey, $groupHash);
 public function markConstraintAsValidated($cacheKey, $constraintHash);
 public function isConstraintValidated($cacheKey, $constraintHash);
 public function markObjectAsInitialized($cacheKey);
 public function isObjectInitialized($cacheKey);
 public function getViolations();
 public function getRoot();
 public function getValue();
 public function getMetadata();
 public function getGroup();
 public function getClassName();
 public function getPropertyName();
 public function getPropertyPath($subPath = '');
}
