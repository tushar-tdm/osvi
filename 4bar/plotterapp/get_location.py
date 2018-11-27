from PIL import Image
import os
basedir = os.path.abspath(os.path.dirname(__file__))

def get(filename):
	pic = Image.open(basedir + '/static/images/'+filename)

	pic_data = list(pic.getdata())

	img_col = (pic.size)[0]
	img_row = (pic.size)[1]

	txtfile = open(basedir + '/static/txt/'+filename[:-4]+".txt", "w")
	for i in range(0,img_row):
		if i&1:
			vI = img_row-i-1
			for j in range(img_col,0):
				pixel_num = img_col*vI + j
				pixel = pic_data[pixel_num]
				if pixel[3] != 0:
					x = round((j/100)*2.54,2)
					y = round((i/100)*2.54,2)
					txtfile.write(str(x)+" "+str(y)+"\n")	
		else:
			vI = img_row-i-1
			for j in range(0,img_col):
				pixel_num = img_col*vI + j
				pixel = pic_data[pixel_num]
				if pixel[3] != 0:
					x = round((j/100)*2.54,2)
					y = round((i/100)*2.54,2)
					txtfile.write(str(x)+" "+str(y)+"\n")
	txtfile.close()