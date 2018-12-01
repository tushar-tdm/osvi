#!/usr/bin/env python
import sys
import time

from shutil import copyfile

user = sys.argv[1]
count = sys.argv[2]
fn = "test"+user+count+".png"
filename = str(fn)

src = "C:/xampp/htdocs/oo/plotter/html/sim/test.png"
dst = "C:/xampp/htdocs/oo/plotterpics/"+filename

copyfile(src, dst)
