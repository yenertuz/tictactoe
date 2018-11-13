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

Example: ./tictactoe "XX.OO...." "X" should return "2" (which stands for tile with the index 2, which means row 1 column 3)
