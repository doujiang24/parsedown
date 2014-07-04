.PYTHON: all directory html

all: directory html


html:
	php config.php convert > ./convert.sh
	/bin/sh convert.sh

directory:
	php config.php directory > svn/directory.markdown
	php convert.php svn/directory.markdown
