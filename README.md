##### Header

**Author:** Yener Tuz
**Creation date:** 11/22/2018

##### Intro

* Simple python script that takes in 2 arguments, a board string and the player's character, and returns the index (0 to 8 inclusive) of the next move the player should play

* **UNBEATABLE**

##### Usage

`./tnm <board_string> <player_char>`

*Example:*

`$ ./tnm "xx...o..o" "x"`
`2`

##### How to convert a board into a board string?

Simply start from the first row, write the three characters, replacing empty tiles with '.' 

_Example:_

`XXO
..O
`X..` => `xxo..ox..`
