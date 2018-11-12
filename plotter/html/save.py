import os
from os import  path
import shutil
import sys
import datetime

def main():
    os.mkdir('tushar')
    if path.exists("test.png"):
    # get the path to the file in the current directory
        src = path.realpath("test.png")
    
	#seperate the path from the filter
	head, tail = path.split(src)
	print("path:" +head)
	print("file:" +tail)
	
	#let's make a backup copy by appending "bak" to the name
	dst = src+".bak"
	# nowuse the shell to make a copy of the file
	shutil.copy(src, dst)
	
	#copy over the permissions,modification
	shutil.copystat(src,dst)

if __name__ =="__main__":
    main()