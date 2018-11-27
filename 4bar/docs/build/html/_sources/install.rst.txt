.. _installation:

Installation of the software
============================

1.0. Installation on windows
----------------------------

1.1. Setting up python & git
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
To get the project up and running on a windows machine, make sure to install python. You can download the latest 
version from the official site for `Python <https://www.python.org/downloads/>`_.

Once installed, make sure to set it up in your `path <https://stackoverflow.com/questions/3701646/how-to-add-to-the-pythonpath-in-windows>`_. 

After installing python, install git for `windows <https://git-scm.com/download/win>`_. 

Then open the Git Bash terminal which looks something like::

    Ashwin Shenoy at Ashwin_Shenoy ~
    $

Type out the following command::

    Ashwin Shenoy at Ashwin_Shenoy ~
    $ python
    
If everything was setup properly, then you should see something similar to the following::

    Python 3.5.4 (v3.5.4:3f56838, Aug  8 2017, 02:17:05) [MSC v.1900 64 bit (AMD64)]
    on win32
    Type "help", "copyright", "credits" or "license" for more information.
    >>>

If you get an error saying that python is not recognised as an internal or external command, then restart
the machine. For more information, refer to this `Stackoverflow post <https://stackoverflow.com/questions/3701646/how-to-add-to-the-pythonpath-in-windows>`_.

To start working with the project, fork the project & do a git clone using the command::

    git clone https://github.com/YOUR_USERNAME/Remotely-Triggered-Vertical-Plotter.git

This should clone the repository in the folder **Remotely-Triggered-Vertical-Plotter** in the location specified by you.

1.2. Setting up virtual environments
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Now that we have the source files, we need to setup virtual environments. A virtual environment is an isolated space for packages/libraries
to be installed for a particular project. Once the virtual environment is running, all the packages installed will be locally installed
and will not affect the dependencies for other projects you will be working on. More on this can be read from `here <https://docs.python-guide.org/dev/virtualenvs/>`_.

To start off, open the git bash terminal and execute the following::

    Ashwin Shenoy at Ashwin_Shenoy ~
    $ pip install virtualenv

Once that's done, create your environment by executing::

    Ashwin Shenoy at Ashwin_Shenoy ~
    $ virtualenv YOUR_VIRTUAL_ENVIRONMENT_NAME

That should create the necessary local files for setting up your environment.

To activat it, run::

    Ashwin Shenoy at Ashwin_Shenoy ~
    $ cd YOUR_VIRTUAL_ENVIRONMENT_NAME/

    Ashwin Shenoy at Ashwin_Shenoy ~
    $ cd Scripts/

    Ashwin Shenoy at Ashwin_Shenoy ~
    $ . activate

Your terminal should now look something like this::

    (YOUR_VIRTUAL_ENVIRONMENT_NAME)
    Ashwin Shenoy at Ashwin_Shenoy ~
    $

Now that we have activated the environment, let's install the dependencies.

The project makes use of flask, which is a microframework for building web applications. 

All the dependencies are in a file **requirements.txt**.

To install them, type the following command::

    (YOUR_VIRTUAL_ENVIRONMENT_NAME)
    Ashwin Shenoy at Ashwin_Shenoy ~
    $ pip install -r requirements.txt

It should install all the dependencies in a minute or two. Once that's done, we are ready to start.

2.0. Installation on linux
--------------------------
    
2.1. Setting up python & git
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

2.2. Setting up virtual environment
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



