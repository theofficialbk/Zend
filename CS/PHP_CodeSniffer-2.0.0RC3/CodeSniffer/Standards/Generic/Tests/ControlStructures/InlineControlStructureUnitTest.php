<?php
/**
 * Unit test class for the InlineControlStructure sniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Unit test class for the InlineControlStructure sniff.
 *
 * A sniff unit test checks a .inc file for expected violations of a single
 * coding standard. Expected errors and warnings are stored in this class.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: 2.0.0RC3
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Generic_Tests_ControlStructures_InlineControlStructureUnitTest extends AbstractSniffUnitTest
{


    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @param string $testFile The name of the file being tested.
     *
     * @return array<int, int>
     */
    public function getErrorList($testFile='InlineControlStructureUnitTest.inc')
    {
        switch ($testFile) {
        case 'InlineControlStructureUnitTest.inc':
            return array(
                    3  => 1,
                    7  => 1,
                    11 => 1,
                    13 => 1,
                    15 => 1,
                    17 => 1,
                    23 => 1,
                    42 => 1,
                    43 => 1,
                    45 => 1,
                    46 => 1,
                    49 => 1,
                   );
            break;
        case 'InlineControlStructureUnitTest.js':
            return array(
                    3  => 1,
                    7  => 1,
                    11 => 1,
                    13 => 1,
                    15 => 1,
                   );
            break;
        default:
            return array();
            break;
        }//end switch

    }//end getErrorList()


    /**
     * Returns the lines where warnings should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of warnings that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getWarningList()
    {
        return array();

    }//end getWarningList()


}//end class

?>
