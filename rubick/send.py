#!/usr/bin/env python
import sys
import serial
import time

ser =  serial.Serial('/dev/ttyACM0',9600)

time.sleep(3)

char = sys.argv[1]
c = str(char)

ser.write(c.encode())



