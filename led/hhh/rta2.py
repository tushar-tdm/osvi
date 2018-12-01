import os
import sys
import serial
import time
import struct

ser = serial.Serial('/dev/ttyACM0',9600)
led = sys.argv[1]
act = sys.argv[2]

l = str(led)
"""a = str(act)"""

time.sleep(5)
ser.write(struct.pack(l.encode())
""" ser.write(l.encode()) """
