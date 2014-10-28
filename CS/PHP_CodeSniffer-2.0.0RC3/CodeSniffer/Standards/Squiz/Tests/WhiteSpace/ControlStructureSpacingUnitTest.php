<?php
/**
 * Unit test class for the ControlStructureSpacing sniff.
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
 * Unit test class for the ControlStructureSpacing sniff.
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
class Squiz_Tests_WhiteSpace_ControlStructureSpacingUnitTest extends AbstractSniffUnitTest
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
    public function getErrorList($testFile='ControlStructureSpacingUnitTest.inc')
    {
        switch ($testFile) {
        case 'ControlStructureSpacingUnitTest.inc':
            return array(
                    3   => 1,
                    5   => 1,
                    8   => 1,
                    15  => 1,
                    23  => 1,
                    74  => 1,
                    79  => 1,
                    82  => 1,
                    83  => 1,
                    87  => 1,
                    103 => 1,
                    113 => 2,
                    114 => 2,
                    118 => 1,
                    150 => 1,
                    153 => 1,
                    154 => 1,
                    157 => 1,
                    170 => 1,
                    176 => 2,
                    179 => 1,
                    189 => 1,
                   );
            break;
        case 'ControlStructureSpacingUnitTest.js':
            return array(
                    3  => 1,
                    9  => 1,
                    15 => 1,
                    21 => 1,
                    56 => 1,
                    61 => 1,
                    64 => 1,
                    65 => 1,
                    68 => 1,
                    74 => 2,
                    75 => 2,
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