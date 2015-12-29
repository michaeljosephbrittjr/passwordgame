The files need to be in a folder in root called 'passwordgame' for the includes to work.
// $INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/passwordgame/"; 

You need to edit connect.php to make sure it matches your localhost environment.  that's all.  the script will create the databases and tables if they don't exist.

this is a social network / game I built last year while teaching myself how to use mysqli.  The body of the index.php is a hideous nest of if-then statements that depend on $_POST data and continual page reloads.  This was written before I knew how to use $_SESSION data, and at the time I was also still hardcoding javascript function calls in HTML tags.

