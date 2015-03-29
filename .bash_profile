export PS1="\[\033[36m\]\u\[\033[m\]@\[\033[32m\]\h:\[\033[33;1m\]\w\[\033[m\]\$ "
export CLICOLOR=1
export LSCOLORS=ExFxBxDxCxegedabagacad
alias ls='ls -GFh'

##
# Your previous /Users/mikekuykendall/.bash_profile file was backed up as /Users/mikekuykendall/.bash_profile.macports-saved_2015-02-27_at_22:09:46
##

# MacPorts Installer addition on 2015-02-27_at_22:09:46: adding an appropriate PATH variable for use with MacPorts.
export PATH="/opt/local/bin:/opt/local/sbin:$PATH"
# Finished adapting your PATH environment variable for use with MacPorts.


alias l='ls -FGlAhp'
alias ..='cd ../'                           # Go back 1 directory level
alias ...='cd ../../'                       # Go back 2 directory levels
alias .3='cd ../../../'                     # Go back 3 directory levels
alias .4='cd ../../../../'                  # Go back 4 directory levels
alias .5='cd ../../../../../'               # Go back 5 directory levels
alias .6='cd ../../../../../../'            # Go back 6 directory levels
alias f='open -a Finder ./'                 # f: Opens current directory in MacOS Finder
alias ~="cd ~"
alias vu='vagrant up'
alias vp='vagrant reload --provision'
alias vs='vagrant status'
alias dev='cd ~/Dropbox/dev_repo'
