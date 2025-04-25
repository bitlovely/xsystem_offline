# Install Xtream UI on ubuntu 20 (offline)
### 1. install ubuntu dependencies for xtream
####  copy lib directory to ubuntu.
        cd lib
        dpkg -i *
#### in this case, may errors from some libs such as mariadb, gwak and libpam.
#### reinstall these libs after inatalling.
### 2. install xtream UI
#### -copy ***install_offline.py***, ***xtreamcodes.zip*** and ***update.zip*** to tmp directory.
#### -start installing
        python install_offline.py
Input installation type to **MAIN**
#### xtream will be copied to dir "/home/xtreamcodes/iptv_xtream_codes"
     cd /home/streamdoes/iptv_xtream_codes