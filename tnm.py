#!/usr/local/bin/python3.7

import sys

def check_rows(board, row_number):
	a = board[0 + (row_number - 1) * 3]
	b = board[1 + (row_number - 1) * 3]
	c = board[2 + (row_number - 1) * 3]
	if a == b and b == c and a != '.':
		return 1
	return 0

def check_columns(board, column_number):
	a = board[column_number - 1]
	b = board[2 + column_number]
	c = board[5 + column_number]
	if a == b and b == c and a != '.':
		return 1
	return 0

def check_diagonal(board, diagonal_number):
	b = board[4]
	a = board[0]
	c = board[8]
	if diagonal_number == 2:
		a = board[2]
		c = board[6]
	if a == b and b == c and a != '.':
		return 1
	return 0

def check_board(board):
	if check_rows(board, 1) == 1:
		return 1
	if check_rows(board, 2) == 1:
		return 1
	if check_rows(board, 3) == 1:
		return 1
	if check_columns(board, 1) == 1:
		return 1
	if check_columns(board, 2) == 1:
		return 1
	if check_columns(board, 3) == 1:
		return 1
	if check_diagonal(board, 1) == 1:
		return 1
	if check_diagonal(board, 2) == 1:
		return 1
	return 0

if len(sys.argv) != 3:
	print("usage: ./tnm <board> <x_or_o>")
	print("example: ./tnm .o.x..x.. x")
	exit(-1)

board = list(sys.argv[1])
character = sys.argv[2]
if character == "x":
	enemy = "o"
else:
	enemy = "x"
i = 0

while i < 9:
	if board[i] == '.':
		new = board.copy()
		new[i] = character
		if check_board(new):
			print(i)
			exit(0)
		new[i] = enemy
		if check_board(new):
			print(i)
			exit(0)
	i += 1

i = 0
while i < 9:
	if board[i] == '.':
		print(i)
		exit(0)
	i += 1