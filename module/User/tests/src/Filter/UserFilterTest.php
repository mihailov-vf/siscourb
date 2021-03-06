<?php

namespace Siscourb\User\Filter;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-03-30 at 15:48:47.
 */
class UserFilterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var UserFilter
     */
    protected $filter;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->filter = new UserFilter;
    }

    /**
     *
     * @param mixed $data
     * @param boolean $valid
     * @param string $testTitle
     *
     * @dataProvider requiredData
     */
    public function testRequiredValidation($data, $testTitle, $valid, $expectedMessages)
    {
        $this->setName($testTitle);

        $this->filter->setData($data);

        $result = $this->filter->isValid();
        $messages = $this->filter->getMessages();
        $this->assertEquals($valid, $result, print_r($messages, true));

        foreach ($expectedMessages as $field => $messageType) {
            $this->assertArrayHasKey($field, $messages, print_r($messages, true));
            $this->assertArrayHasKey($messageType, $messages[$field], print_r($messages[$field], true));
        }
    }

    public function requiredData()
    {
        return array(
            array(
                array(
                    'name' => 'Joe',
                    'email' => 'joe@joe.com',
                    'password' => 'jo3MaxTurbo',
                ),
                'testValidData',
                true,
                array()
            ),
            array(
                array(),
                'testEmptyData',
                false,
                array(
                    'name' => 'isEmpty',
                    'email' => 'isEmpty',
                    'password' => 'isEmpty',
                )
            ),
            array(
                array(
                    'id' => 'a',        //should be a number
                    'name' => '123',    //should be Aplha
                    'email' => 'joe',   //email address
                    'password' => 'a',  //should be between 6 and 24 characters
                ),
                'testInvalidData1',
                false,
                array(
                    'id' => 'notDigits',
                    'name' => 'notAlpha',
                    'email' => 'emailAddressInvalidFormat',
                    'password' => 'stringLengthTooShort',
                )
            ),
            array(
                array(
                    'name' => $this->generateText(300),
                    'email' => 'joe@asd',
                    'password' => 'a',
                ),
                'testInvalidData2',
                false,
                array(
                    'name' => 'stringLengthTooLong',
                    'email' => 'emailAddressInvalidHostname',
                    'password' => 'stringLengthTooShort',
                )
            ),
        );
    }
    
    protected function generateText($size)
    {
        $text ="";
        for ($i=0; $i<$size; $i++) {
            $text .= chr(mt_rand(ord('a'), ord('z')));
        }
        
        return $text;
    }
}
