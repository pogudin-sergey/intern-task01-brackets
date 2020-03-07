<?php
use PHPUnit\Framework\TestCase;
use Pogudin\Verifier;

class bracketsTest extends TestCase
{
    public function providerValidatorTrue(){
        return [
            ['(5+5)'],
            ['(5+5)()'],
            ['((10-2)*5+5)'],
            ['((()))']
        ];
    }

    public function providerValidatorFalse(){
        return [
            ['(5+5('],
            ['(5+5)('],
            ['((5+5)'],
            ['(5+5))'],
            ['((10-2))*5+5)'],
            ['((())']
        ];
    }

    /**
     * @dataProvider providerValidatorTrue
     */
    public function testBracketsValidatorTrue($a)
    {
        $this->assertTrue(Verifier\Brackets::verify($a));
    }

    /**
     * @dataProvider providerValidatorFalse
     */
    public function testBracketsValidatorFalse($a)
    {
        $this->assertFalse(Verifier\Brackets::verify($a));
    }

    /**
     * @dataProvider providerValidatorTrue
     */
    public function testBracketsValidatorShellTrue($a)
    {
        $this->shellValidator($a, true);
    }

    /**
     * @dataProvider providerValidatorFalse
     */
    public function testBracketsValidatorShellFalse($a)
    {
        $this->shellValidator($a, false);
    }

    public function shellValidator($a, $type)
    {
        $result_map = array(
            'OK' => true,
            'INCORRECT' => false,
        );

        $script_dir = realpath(__DIR__ . '/../script/');
        $script_path = realpath($script_dir . '/run.php');

        exec("cd $script_dir; php -f $script_path '$a'", $result);
        $result = implode('', $result);

        if (array_key_exists($result, $result_map))
        {
            if ($type)
                $this->assertTrue($result_map[$result]);
            else
                $this->assertFalse($result_map[$result]);

        } else {
            $this->fail("Error shell script. Result is: $result");
        }
    }
}
