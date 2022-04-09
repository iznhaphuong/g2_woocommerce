<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_EmbeddedFile extends Swift_Mime_Attachment
{
 public function __construct(Swift_Mime_SimpleHeaderSet $headers, Swift_Mime_ContentEncoder $encoder, Swift_KeyCache $cache, Swift_IdGenerator $idGenerator, $mimeTypes = [])
 {
 parent::__construct($headers, $encoder, $cache, $idGenerator, $mimeTypes);
 $this->setDisposition('inline');
 $this->setId($this->getId());
 }
 public function getNestingLevel()
 {
 return self::LEVEL_RELATED;
 }
}
