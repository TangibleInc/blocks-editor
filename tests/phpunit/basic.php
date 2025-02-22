<?php
namespace tests\blocks;

class Basic_TestCase extends \WP_UnitTestCase {
  function test_plugin_function() {
    $this->assertTrue( function_exists( 'tangible_blocks_editor' ) );
  }
}
