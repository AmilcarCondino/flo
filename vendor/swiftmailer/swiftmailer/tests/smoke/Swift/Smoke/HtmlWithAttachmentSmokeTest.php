<?php

/**
 * @group smoke
 */
class Swift_Smoke_HtmlWithAttachmentSmokeTest extends SwiftMailerSmokeTestCase
{
    public function setUp()
    {
        $this->_attFile = __DIR__.'/../../../_samples/files/textfile.zip';
    }

    public function testAttachmentSending()
    {
        $mailer = $this->_getMailer();
        $message = Swift_Message::newInstance('[Swift Mailer] HtmlWithAttachmentSmokeTest')
            ->setFrom(array(SWIFT_SMOKE_EMAIL_ADDRESS => 'Swift Mailer'))
            ->setTo(SWIFT_SMOKE_EMAIL_ADDRESS)
            ->attach(Swift_Attachment::fromPath($this->_attFile))
            ->setBody('This HTML-formatted message should contain an attached ZIP file (named "textfile.zip").'.PHP_EOL.
                'When unzipped, the archive should produce a text file which reads:'.PHP_EOL.
                '<q>This is part of a Swift Mailer v4 smoke test.</q>', 'text/html'
            )
            ;
        $this->assertEquals(1, $mailer->send($message),
            '%s: The smoke test should send a single message'
            );
    }
}
