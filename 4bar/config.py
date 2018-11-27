import os
basedir = os.path.abspath(os.path.dirname(__file__))

class Config(object):
	SECRET_KEY = os.environ.get('SECRET_KEY') or 'you-will-never-guess'

	SQLALCHEMY_DATABASE_URI = os.environ.get('DATABASE_URL') or 'sqlite:///' + os.path.join(basedir, 'rtvp.db')
	SQLALCHEMY_TRACK_MODIFICATIONS = False

	UPLOADS_DEFAULT_DEST = basedir + 'plotterapp/static/images/'
	UPLOADS_DEFAULT_URL = 'http://localhost:5000/static/images/'
 
	UPLOADED_IMAGES_DEST = basedir + 'plotterapp/static/images/'
	UPLOADED_IMAGES_URL = 'http://localhost:5000/static/images/'