<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class UnitTester extends \Codeception\Actor{
	
    use _generated\UnitTesterActions;
    
    public $shortCode;
    public $returnedContent;
    
    /**
     * @Given i put the shortcode :arg1 in a post
     */
    public function iPutTheShortcodeInAPost($arg1){
    	$this->shortCode = $arg1;
    }  
    
    /**
     * @When the shortcode is redered
     */
    public function theShortcodeIsRedered(){
    	$shortCode = $this->shortCode;
    	$this->returnedContent = do_shortcode($shortCode);
    }
    
    /**
     * @Then it should return :arg1
     */
    public function itShouldReturn($arg1){
    	
    	$expectedReturn= $arg1;
    	$returnedContent= $this->returnedContent;
    	$this->assertSame($expectedReturn, $returnedContent);
    }
    
    
    
}
