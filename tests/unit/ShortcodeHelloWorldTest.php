<?php

class ShortcodeHelloWorldTest extends \Codeception\TestCase\WPTestCase{

	/**
	 * @test
	 * it should render the shortcode
	 */
	public function it_should_render_the_shortcode(){
		
	    // GIVEN / ARRANGE
		$shortCode = "[first-testable-shortcode]";
		
		// WHEN / ACT
		$returnedContent = do_shortcode($shortCode);
		
		// THEN / ASSERT
		$this->assertContains("Hello World!", $returnedContent);
	}
	
}