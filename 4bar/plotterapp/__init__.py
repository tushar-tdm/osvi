from flask import Flask
from config import Config
from flask_sqlalchemy import SQLAlchemy
from flask_migrate import Migrate
from flask_uploads import UploadSet, IMAGES, configure_uploads

plotterapp = Flask(__name__)
plotterapp.config.from_object(Config)
db = SQLAlchemy(plotterapp)
migrate = Migrate(plotterapp, db)
images = UploadSet('images', IMAGES)
configure_uploads(plotterapp, images)

from plotterapp import routes, models