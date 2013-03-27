<?php
/**
 * Recursive function for parsing and randomizing
 * given sentence.
 * @author Marko Martinović <marko@techytalk.info>
 *
 * @param string $sentence Given sentence
 * @return string Random sentence
 */
function randomizer($sentence){
    $rand_sentence = '';

    // Split sentence into characters
    $char_array = str_split($sentence);

    // Open braces counter
    $br_count = 0;

    // Opening left brace offset
    $br_start = 0;

    // Iterate over characters
    foreach ($char_array as $key => $char) {
        switch ($char){

            // Is it left brace?
            case '{':
                // Is it opening brace?
                if($br_count == 0){
                    // If it is note the offset
                    $br_start = $key;
                }

                // Increment open braces counter
                $br_count++;
                break;

                // Is it right brace?
            case '}':
                // Decrement open braces counter
                $br_count--;

                // Is it closing brace?
                if($br_count == 0) {
                    /* Call randomizer again to detect nested
                     * braces in the current section. Randomizer
                     * returns current section but without any
                     * nested braces so we can proceed with
                     * exploding it using | character */
                    $rands = explode(
                        '|',
                        randomizer(
                            implode(
                                '',
                                array_slice(
                                    $char_array,
                                    $br_start + 1,
                                    $key - $br_start - 1
                                )
                            )
                        )
                    );

                    /* Store random element of current section's
                     * | exploded array */
                    $rand_sentence .= $rands[array_rand($rands)];
                }
                break;

                // Is it any other character?
            default:
                /* Since | is only inside {} delimited section,
                 * if there aren't any open braces we can just store
                 * other chracters. */

                if($br_count == 0){
                    $rand_sentence .= $char;
                }
        }
    }

    return $rand_sentence;
}
?>
