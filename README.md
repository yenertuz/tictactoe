# tictactoe_next_move

**Goal**: to create an unbeatable tic tac toe player

**Keyworda:** decision-making

3 subgoals (parts): 

1) Generate all possible table instances and moves (there is fewer than 2^9)

^ can be in any language

2) Index these so they're easily accessible by part 3

^ can be in any language

3) write a program that takes in a tictactoe json as argument and returns the next best move

^ performance important

Example: ./tictactoe "xx.oo...." "x" should return "2" (which stands for tile with the index 2, which means row 1 column 3)

argv1 for ./tictactoe will be a **tictactoe string**, which is a tictactoe board with empty tiles represented as "." and no newlines or any characters other than "x" and "o"
