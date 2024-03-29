<?php
/**
 * Verifies that control statements conform to their coding standards.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Verifies that control statements conform to their coding standards.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: 2.0.0RC3
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Squiz_Sniffs_ControlStructures_ControlSignatureSniff implements PHP_CodeSniffer_Sniff
{

    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
                                   'PHP',
                                   'JS',
                                  );


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return int[]
     */
    public function register()
    {
        return array(
                T_TRY,
                T_CATCH,
                T_DO,
                T_WHILE,
                T_FOR,
                T_IF,
                T_FOREACH,
                T_ELSE,
                T_ELSEIF,
               );

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in the
     *                                        stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        // Single space after the keyword.
        $found = 1;
        if ($tokens[($stackPtr + 1)]['code'] !== T_WHITESPACE) {
            $found = 0;
        } else if ($tokens[($stackPtr + 1)]['content'] !== ' ') {
            if (strpos($tokens[($stackPtr + 1)]['content'], $phpcsFile->eolChar) !== false) {
                $found = 'newline';
            } else {
                $found = strlen($tokens[($stackPtr + 1)]['content']);
            }
        }

        if ($found !== 1) {
            $error = 'Expected 1 space after %s keyword; %s found';
            $data  = array(
                      strtoupper($tokens[$stackPtr]['content']),
                      $found,
                     );

            $fix = $phpcsFile->addFixableError($error, $stackPtr, 'SpaceAfterKeyword', $data);
            if ($fix === true) {
                if ($found === 0) {
                    $phpcsFile->fixer->addContent($stackPtr, ' ');
                } else {
                    $phpcsFile->fixer->replaceToken(($stackPtr + 1), ' ');
                }
            }
        }

        // Single space after closing parenthesis.
        if (isset($tokens[$stackPtr]['parenthesis_closer']) === true
            && isset($tokens[$stackPtr]['scope_opener']) === true
        ) {
            $closer  = $tokens[$stackPtr]['parenthesis_closer'];
            $opener  = $tokens[$stackPtr]['scope_opener'];
            $content = $phpcsFile->getTokensAsString(($closer + 1), ($opener - $closer - 1));

            if ($content !== ' ') {
                $error = 'Expected 1 space after closing parenthesis; found "%s"';
                $data  = array(str_replace($phpcsFile->eolChar, '\n', $content));
                $fix   = $phpcsFile->addFixableError($error, $closer, 'SpaceAfterCloseParenthesis', $data);
                if ($fix === true) {
                    if ($closer === ($opener - 1)) {
                        $phpcsFile->fixer->addContent($closer, ' ');
                    } else {
                        $phpcsFile->fixer->beginChangeset();
                        for ($i = ($closer + 1); $i < $opener; $i++) {
                            $phpcsFile->fixer->replaceToken($i, '');
                        }

                        $phpcsFile->fixer->addContent($closer, ' ');
                        $phpcsFile->fixer->endChangeset();
                    }
                }
            }
        }//end if

        // Single newline after opening brace.
        if (isset($tokens[$stackPtr]['scope_opener']) === true) {
            $opener = $tokens[$stackPtr]['scope_opener'];
            $next   = $phpcsFile->findNext(T_WHITESPACE, ($opener + 1), null, true);
            $found  = ($tokens[$next]['line'] - $tokens[$opener]['line']);
            if ($found !== 1) {
                $error = 'Expected 1 newline after opening brace; %s found';
                $data  = array($found);
                $fix   = $phpcsFile->addFixableError($error, $opener, 'NewlineAfterOpenBrace', $data);
                if ($fix === true) {
                    $phpcsFile->fixer->beginChangeset();
                    for ($i = ($opener + 1); $i < $next; $i++) {
                        $phpcsFile->fixer->replaceToken($i, '');
                    }

                    $phpcsFile->fixer->addContent($opener, $phpcsFile->eolChar);
                    $phpcsFile->fixer->endChangeset();
                }
            }
        } else if ($tokens[$stackPtr]['code'] === T_WHILE) {
            // Zero spaces after parenthesis closer.
            $closer = $tokens[$stackPtr]['parenthesis_closer'];
            $found  = 0;
            if ($tokens[($closer + 1)]['code'] === T_WHITESPACE) {
                if (strpos($tokens[($closer + 1)]['content'], $phpcsFile->eolChar) !== false) {
                    $found = 'newline';
                } else {
                    $found = strlen($tokens[($closer + 1)]['content']);
                }
            }

            if ($found !== 0) {
                $error = 'Expected 0 spaces before semicolon; %s found';
                $data  = array($found);
                $fix   = $phpcsFile->addFixableError($error, $closer, 'SpaceBeforeSemicolon', $data);
                if ($fix === true) {
                    $phpcsFile->fixer->replaceToken(($closer + 1), '');
                }
            }
        }//end if

        // Only want to check multi-keyword structures from here on.
        if ($tokens[$stackPtr]['code'] === T_TRY
            || $tokens[$stackPtr]['code'] === T_DO
        ) {
            $closer = $tokens[$stackPtr]['scope_closer'];
        } else if ($tokens[$stackPtr]['code'] === T_ELSE
            || $tokens[$stackPtr]['code'] === T_ELSEIF
        ) {
            $closer = $phpcsFile->findPrevious(T_CLOSE_CURLY_BRACKET, ($stackPtr - 1));
        } else {
            return;
        }

        // Single space after closing brace.
        $found = 1;
        if ($tokens[($closer + 1)]['code'] !== T_WHITESPACE) {
            $found = 0;
        } else if ($tokens[($closer + 1)]['content'] !== ' ') {
            if (strpos($tokens[($closer + 1)]['content'], $phpcsFile->eolChar) !== false) {
                $found = 'newline';
            } else {
                $found = strlen($tokens[($closer + 1)]['content']);
            }
        }

        if ($found !== 1) {
            $error = 'Expected 1 space after closing brace; %s found';
            $data  = array($found);
            $fix   = $phpcsFile->addFixableError($error, $closer, 'SpaceAfterCloseBrace', $data);
            if ($fix === true) {
                if ($found === 0) {
                    $phpcsFile->fixer->addContent($closer, ' ');
                } else {
                    $phpcsFile->fixer->replaceToken(($closer + 1), ' ');
                }
            }
        }

    }//end process()


}//end class
