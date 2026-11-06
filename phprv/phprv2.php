<?php
# file handling in php
# fclose() : PHP usually closes open files automatically when the script ends, but explicitly calling fclose() makes the cleanup happen as soon as you’re done.

# fgets() : it reads the one line at a time from file : fgets($file)

# fwrite : write into the file : w mode writes, a mode appends : + will do both `read` and `write`
# rewind() : back the file pointer to the start of the file
# file_get_contents() : get content of the file
# file_put_contents() : overrite the content and write the content in file
# unlink($filepath) : delete the file, return true or false
# file_exists : check if file exists
# is_file : check if given type is file or not
# is_dir : checks for directory explicitly
# copy() : make copy of the file to given destination
# rename : either rename file or move file from current dir to given destination
# mkdir() : make directory with privilages : mkdir("/dir",0777,true) : where true mean create recursive or missing parent directory too
# rmdir() : remove the directory, directory must be empty
# move_uploaded_file() : move the file from temp_dir where php uploaded to given destination at server
# fgetc() : reads one CHARACTER at a time (vs fgets which reads one LINE)
# fgets() : reads one line at a time, pointer goes at start of next line, return false on EOF, need to be handle