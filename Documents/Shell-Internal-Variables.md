# Built in variables in bash shell

* $BASH
	The path to the Bash binary itself.

* $BASH_ENV
	An environmental variable pointing to a Bash startup file to be read when a script is invoked.

* $BASH_SUBSHELL
	A variable indicating the subshell level.

* $BASHPID or $$
	Process ID of the current instance of Bash.

* $BASH_VERSINFO[n]
	A 6-element array containing version information about the installed release of Bash.

* $BASH_VERSION
	The version of Bash installed on the system.

* $EDITOR
	The default editor invoked by a script, usually vi or emacs.

* $EUID
	"effective" user ID number.

* $FUNCNAME
	Name of the current function.

* $IFS
	internal field separator. `ls$IFS-al` is the same as `ls -al`.

* $IGNOREEOF
	Ignore EOF: how many end-of-files (control-D) the shell will ignore before logging out.