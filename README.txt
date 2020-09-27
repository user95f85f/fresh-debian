#REM this is window's cygwin-only
sleep_since(){
  perl ~/sleep-since.pl "$(ps | grep '/usr/bin/sleep' | head -1 | awk '{print $7}')" "$(date +%H:%M:%S)"
}
alias inxi2='sudo /usr/bin/inxi -plu' #REM this is ubuntu-only. shows swap-usage, mounted-usage
alias google='ping google.com;sleep 2;exit 0' #IE. test internet connection REM this is windows cygwin-only
alias weechat='weechat -a -p'
alias ffplay1='/cygdrive/c/ffmpeg/bin/ffplay -autoexit' #</for videos or big music files>
alias ffplay2='/cygdrive/c/ffmpeg/bin/ffplay -autoexit -nodisp' #</for small music files>

alias youtube-dl-x='./youtube-dl --audio-quality 0 --audio-format mp3 -x'
alias l='ls'
alias ..='cd ..'
alias mv='/usr/bin/mv -i' #REM this is system dependent
cd2(){
mkdir "$1" && cd "$1"
}


#<~/str-reverse.pl>
#!/usr/bin/perl
my $str = $ARGV[0] or die '';
my @ar = split / /, $str;
foreach my $i (0 .. $#ar){
  print join('', reverse(split(//, $ar[$i])));
  if($i < $#ar){print ' ';}
}
print "\n";



#<~/sleep-since.pl>
#!/usr/bin/perl

$i1=$ARGV[0]; #EG. 10:10:10
$i2=$ARGV[1]; #EG. 11:11:11

if($i1 eq ''){
  die '';
}
elsif($i2 eq ''){
  die '';
}

sub assert($$){
  my $arg1 = shift;
  my $arg2 = shift;
  if($arg1 ne $arg2){
    die "$arg1 != $arg2";
  }
  return 1;
}
sub println($){
  my $arg1 = shift;
  print "$arg1\n";
}

#<testing>
assert(time_diff(split(/:/, '00:00:00'), split(/:/, '01:01:01')), '1:1:1') and println 'test 1 OK';
assert(time_diff(split(/:/, '23:00:00'), split(/:/, '01:01:01')), '2:1:1') and println 'test 2 OK';
assert(time_diff(split(/:/, '01:01:01'), split(/:/, '02:02:02')), '1:1:1') and println 'test 3 OK';
assert(time_diff(split(/:/, '01:01:00'), split(/:/, '02:00:00')), '0:59:0') and println 'test 4 OK';
assert(time_diff(split(/:/, '01:00:01'), split(/:/, '02:00:00')), '0:59:59') and println 'test 5 OK';
#</testing>


my $diff = time_diff(split(/:/, $i1), split(/:/, $i2));
$diff =~ s/(\d+):(\d+):(\d+)/\1hr \2min \3sec slept so far/;
print $diff;


sub time_diff($$$$$$){
  my $hr_before = shift;
  my $min_before = shift;
  my $sec_before = shift;

  my $hr_after = shift;
  my $min_after = shift;
  my $sec_after = shift;

  #01:01:00-02:00:00
  #hr_diff = 0
  #min_diff = 59
  #sec_diff = 0
  my $hr_diff = $hr_after - $hr_before;
  if($hr_diff < 0.0){
    $hr_diff = 24 - $hr_before + $hr_after;
  }
  my $min_diff = $min_after - $min_before;
  if($min_diff < 0.0){
    $hr_diff--;
    $min_diff = 60 - $min_before + $min_after;
  }
  my $sec_diff = $sec_after - $sec_before;
  if($sec_diff < 0.0){
    $min_diff--;
    $sec_diff = 60 - $sec_before + $sec_after;
    if($min_diff < 0.0){
      $hr_diff--;
      $min_diff = 60 + $min_diff;
    }
  }
  return "$hr_diff:$min_diff:$sec_diff";
}
:se ts=3
:se sw=3
:se expandtab
/etc/apache2/apache2.conf example change:

<Directory /media/user/mydebhelper/Documents/>
Options Indexes FollowSymLinks
AllowOverride None
Require all granted
</Directory>

/etc/apache2/sites-available/000-default.conf example change:

DocumentRoot /media/user/mydebhelper/Documents
find /usr/share/X11/xorg.conf.d/40-libinput.conf
find "touchpad"
put this toward the end of the paragraph:

Option "Tapping" "on"

sudo systemctl restart lightdm #restart your GUI system
kill -15 -2 -1 -9

#cron is stupid
sudo systemctl stop anacron.timer
sudo systemctl stop cron
sudo systemctl disable anacron.timer
sudo systemctl disable cron

#stop avahi-daemon from listening on ports
sudo systemctl stop avahi-daemon
sudo systemctl stop avahi-daemon.socket
sudo systemctl disable avahi-daemon.socket
sudo systemctl disable avahi-daemon

sudo apt install apache2 libapache2-mod-php apt-file atool build-essential chromium default-jdk emacs-nox ffmpeg gedit gimp git gparted hexchat inkscape kate links links2 lynx mtr-tiny net-tools php rhythmbox sshfs wget vim-nox xed

#get localhost rolling:
sudo apt install apache2 libapache2-mod-php

#get essential
sudo apt install atool chromium default-jdk ffmpeg gparted hexchat kate lynx net-tools php rhythmbox wget vim-nox
#what's not here: continue{} block, OOP (mostly), threads, POD,
#                 exporting subroutines (mostly), packages, debugging,
#                 special variables (mostly), regular expressions (mostly).
String fxns (chomp,chop,chr,index,lc,length,oct,ord,rindex,split,sprintf,substr,uc,ucfirst)
Array/List fxns (@ARGV,grep,join,map,pop,push,reverse,shift,sort,splice,qw//,unshift,List::Util=shuffle)
Hash fxns (delete,each,exists,keys,values)
Variable fxns (defined,ref,scalar)
All fxns(printf,undef,Data::Dumper)
Exception fxns ($@[eval error])
Math fxns (**,abs,hex,int,oct,rand,sqrt,Math::Trig=:pi[pi])
Misc fxns (``,__FILE__,__LINE__,__PACKAGE__,caller,die,eval,sleep,system,warn)
Filesystem fxns (<>,$/[$RS],chdir,chmod,Cwd,eof,File::Copy,glob,link,open,read,readlink,rename,rmdir,seek,select,stat,symlink,sysread,syswrite,sysseek,tell,umask,unlink)
Directory fxns (mkdir,closedir,opendir,readdir,rewinddir,seekdir,telldir)
Library fxns (Exporter)
OOP fxns (bless)

#---------------------------------------------------------------------------------

# file_is_readable?(); file_is_writeable?(); is_dir?(); is_folder?();
# is_empty_file?(); is_nonempty_file?(); is_text_file?();
# is_binary_file?(); is_regular_file?() [ie. not directory, tty]
# file_exists?()
perldoc -f -X

# system() backtick `` operator
perldoc perlop #look for 'qx'

# <<EOF;
#EOF
perldoc perlop #look for 'here-doc'

#unicode stuff-that-I-find-confusing
perldoc perluniintro

#---------------------------------------------------------------------------------

#on windows 8.0 using powershell 3.0
echo 'how are you today?' | \
  perl -Mstrict -Mwarnings -ne '$_=join(\" \", unpack(\"U*\",$_));print'
perldoc whatever > ~/whatever.txt #& then open it with notepad.

#on windows 8.0 with Strawberry perl
perl Makefile.PL; dmake; dmake test; dmake install

#doing individual tests
prove -vbl t/whatever.t

#on GNU/Linux
echo 'how are you today?' | \
  perl -Mstrict -Mwarnings -ne '$_=join(" ", unpack("U*",$_));print'

#---------------------------------------------------------------------------------

#convert binary scalar string to scalar integer value
bin(): sub bin{return oct('0b' . $_[0])}

See:
sprintf('%b', 100) #1100100
         %o        #144 (octal)
         %x        #64 (hex)
    unpack('C', chr(ord('r'))) #114
bin(unpack('b*',chr(ord('r'))) #(01001110) -> 78

ret_new_List_with_altered_returns{}: map{}
filter_valid{}: grep{}

redo next (ie. continue) last (ie. break)

my $sz = 'A crazy horse named Joe.';
if(my ($name) = $sz =~ m{A .* horse named ([^.]+)\.}){
# m()  m''  m!!  m##  m//  //
  say "Name: $1";
  say "Name: $name";
}
#perldoc perlretut | perlreref | perlre | perlrequick | perlcheat

#Precedence
=pod
  or
  and
  LIST ops
  =
  ?:
  ..
  ||  //
  &&
  |   ^
  &
  ==
  <<  >>
  +   -   .
  *   /   %
  =~
  ~
  **
=cut
#perldoc perlcheat, perldoc perlop

sub callme1($){
  print Dumper([@_]);
  return '';
}
sub callme2{
  print Dumper([@_]);
  return '';
}
say callme1 1, 2, 3, 4, 5; #callme1 absorbs '1'
say callme2 1, 2, 3, 4, 5; #callme2 absorbs all

sub file_get_contents{
  open(my $input, '<', $_[0]) or die $!;
  my $str;
  {
    local $/;
    $str = <$input>;
  }
  return $str;
}

#-| is post. |- is pre.
#:raw prevents '\n' being treated as '\r\n' on Windows/Win32/Win64
use IO::Handle;
open(my ${input}, '<', q!mydata.txt!) or die $!;
open(my ${output}, '|-:raw', 'tail -10 | sort') or die $!;
=pod
my $all;
{
  local $/;
  $all = <$input>;
}
=cut
my $one_byte;
{
  local $/ = \1; #`perldoc perlvar` & look for INPUT_RECORD_SEPARATOR or $RS
                 #newline by default.
  $one_byte = <$input>;
}
seek ${input}, 0, 0; #bring it back to the beginning.
${output}->autoflush(1);
print ${output} @input_lines;
exit; #same as 'exit 0'

#get all files in PWD
opendir(my $dirh, './');
say for(readdir($dirh));

# changes all values of @array to 'whatever'!!!
my @array = (1,2,3);
for my $i(@array){
  $i = 'whatever';
}

my @array = qw{1 2 3 4 5 6 7 8 9 10 11 12 13 14 15};
$_ *= 8 for (@array);
say shift(@array) while(@array);

chomp(@output = `command`);

sub name_of_sub{
  my $argument = shift // 'default'; #meaning: execute if undef
  return $argument . ' is OK.';
}
print name_of_sub();

use feature qw/say/;
use feature 'say';
use feature qw!say!;
use feature qw'say';
use feature qw{say};
use feature qw(say);
use feature qw#say#;
my $n = 0b0100_1011_1001_0100_1110; #309582
say $n;
CORE::say $n;

my @array = qw{1 2 3 4 5 6 7};
m![23]! && say for(@array);

#both of these are the same:
my $s = undef;
my $s;

my $nTotalCounted = () = get_a_list_of_whatever();

my %hash = (
  hello=>'world',
  world=>'cyman'
);
foreach my $key (keys %hash){
  delete $hash{$key};
}
#is the same as...
delete @hash{keys %hash};
#is the same as...
%hash = ();
#is the same as...
undef %hash;

my ($hello, $again);
my @world = (1);
sub hello{
  ($hello,$again) = @world;
  print "undefined\n" if(!defined($again)); #true.
}
hello();

my @array = (1,2,3);
my $val;
while(defined($val = shift(@array))){
  print $val;
}

for(my $i=0; $i<3; $i++){
  print $i, "\n"; #0, 1, 2
  my $i = 8;
}

#works the same with hashes
my @has_values = (1,2,3);
my @no_values = ();
if(@has_values){
  print "Yes I know\n";
}
if(! @no_values){
  print "Yes I know\n";
}

while(my ($key,$value) = each(%ENV)){
  print "$key:$value\n";
}

local $@; #reset to undef
eval{ die 'msg' };
if(my $exception = $@){
  chomp $exception;
  say "exception caught: $exception"; #msg at test.pl line 7.
}
#$exception does not exist out here.

#named locators!
if( 'whatever' =~ /^(?<_found>[hatw]+)(?<_cool>[erv]+)/ ){
  say $+{_found}, "\n", $+{_cool}; #what\never
}

            Read
            v Write
            v v Append only
            v v   Create non-existing
            v v     Clobber existing
<           Y N N N N *
>           N Y N Y Y * 
>>          N Y Y Y N *
+<          Y Y N N N
+>          Y Y N Y Y
+>>         Y Y Y Y N

#convert all characters to a list of numbers:
unpack('U*', $mystring);

#file test operators
-r File is readable by effective uid/gid.
-w File is writable by effective uid/gid.
-x File is executable by effective uid/gid.
-o File is owned by effective uid.
-e File exists.
-z File has zero size (is empty).
-s File has nonzero size (returns size in bytes).
-f File is a plain file.
-d File is a directory.
-l File is a symbolic link.
-T File is a textfile.
-B File is a binary file.

#get a file list from STDIN :)))
while (<>) {
  chomp;
  next unless -f $_; # ignore specials
  #...
}

#an array with spaces for when qw// just isn't enough.
my @array = split(/, /, q{My string which has multiples, And here another, and another, end});

local $" = ', '; #is initially a space. Cannot/should-not be undef.
my @array = qw/Berkeley OSU UofO Titanium-Oxide/;
say "@array"; #Berkeley, OSU, UofO, Titanium-Oxide

my $pos=-1;
while( ($pos = index($string, $lookfor, $pos)) > -1){
  print "Found @ $pos\n";
  $pos++;
}

delete @{ $dungeon[$x][$y] }{'OCCUPIED','DAMP','CLOTH'};

use IPC::Run 'run';
my $stdin = "Input";
my $exitstatus = run [ $command, @args ], \$stdin, \my $stdout, \my $stderr;

my @options = ( \&name_of_this_sub1, \&name_of_this_sub2,
  \&name_of_this_sub3 );
print $options[rand @options]->(); #the float auto-converts to int
sub name_of_this_sub1{ 'yes!' }
sub name_of_this_sub2{ 'no!' }
sub name_of_this_sub3{ 'maybe!' }

my $i_am_done = 0;
$_ = 0;
until($i_am_done){ #this is cool
  $_++;
  $i_am_done = 1 if($_ > 5)
}
say;

(?:) means don't capture.
EG. (?:hello|world|end of days) 


String fxns (in,not in)
from str (.center,.count,.find,.index,.isdigit,.isalpha,
  .join,len,.ljust,.lstrip,.rjust,.split)
Array/List fxns (.append,.clear,.copy,.count,.extend,in,.index,
  .insert,list,not in,.pop,.remove,.reverse,.sort)
Dict/Hash fxns (.values,.keys,in,not in)
mydict = { 1:'sup', 's':'a value' }
Variable fxns (False,int,is,None,range,repr,str,True,type)
Math fxns (**,pow,round)
from float (.is_integer)
from math import (ceil,degrees,*e,fabs,floor,*pi,radians,sqrt)
from os import unlink,stat
from random import choice,gauss,randint,shuffle
from re (.compile) #search compile on this page.
from struct import pack, unpack

#---------------------------------------------------------------------------------

def file_get_contents(_filename):
  ret ''.join(open(_filename, 'r').readlines())

#---------------------------------------------------------------------------------

#DateTime shit. pydoc datetime
import datetime
print(datetime.datetime.now())
from datetime import datetime, date, time, timedelta
datetime.now()
dt = datetime.strptime("21/11/06 16:30", "%d/%m/%y %H:%M")
tt = dt.timetuple()
for it in tt:
  print(it)
dt -= timedelta(hours=8)
dt.strftime('%b %d. %I:%M %p') #Jul 04. 06:01 PM

#---------------------------------------------------------------------------------

https://docs.python.org/3/library/pathlib.html#module-pathlib
https://docs.python.org/3/library/os.path.html#module-os.path
get_file_last_modified('/etc/bashrc')
is_regular_file?()
is_symbolic_link?()
pydoc os
cd() #chdir()
chmod()
chown() #pydoc shutil.chown()
cp()    #pydoc shutil.copyfile()
cp-R()  #pydoc shutil.copytree()
df()    #pydoc shutil.disk_usage('/')
env()   #getenv('PATH')
file_get_last_access_timestamp()
file_get_last_change/mod_timestamp()
file_get_size()
file_get_temp() #tempnam(), tmpfile(), tmpnam()
  #pydoc tempfile
file_get_owner()
file_make_archive() #pydoc shutil.make_archive
file_open()         #open()
file_read_line-by-line() #pydoc fileinput
file_seek(f,0)   #go back to the beginning...bitch.
ln(target, name) #symlink()
ls()    #aka. dir, listdir. show directory/folder contents
mkdir() #aka. makedirs()
mv()    #aka. rename()
process_kill(ID, SIG) #kill_process
process_get_owner #geteuid() get THIS process.
ps_user_owner()   #(current processes)
pwd()      #getcwd()
rm()       #aka. remove(), removedirs(), rmdir()
rm-fr()    #pydoc shutil.rmtree()
system()   #`echo sup`
touch()    #aka. utime(). set times for file.
username() #getlogin() get current user's login name.
which()    #pydoc shutil.which(str_cmd)

#---------------------------------------------------------------------------------

print(r'\n\n\n\n')#\n\n\n\n gets printed.
print('\n\n\n\n') #these last two are the same.
print("\n\n\n\n")

import random
l = [1,2,3,4,5]
random.shuffle(l)
print(l)

mydict = {1:'sup', '2':'value'}
print(repr(mydict)) #{1: 'sup', '2': 'value'}
if '1' in mydict:   #NO
  print(mydict['1'])
if 2 in mydict:     #NO
  print(mydict[2])

f = open('readthis.txt') #default is reading
ar = f.readlines()
print(repr(sz)) #['line 1\n', 'line 2\n', 'line 3']
ar.append("\na new line bitch")
f.close()
f = open('readthis.txt', 'w') #'w+' or 'a' to auto-create
f.writelines(ar)              #'w+' auto-purges

if ! False:
  print('syntax error')
if not False:
  print('this works')
  
print('hello'.isalpha()) #True
print('hello'.isdigit()) #False

print(type((1,2,3))) #<class 'tuple'>
print(type([1,2,3])) #<class 'list'>

for i in range(0, 3, 3): #increment by 3
  print(i)  #0
for i in range(0, 4, 3): #increment by 3
  print(i)  #0.3.
  
from random import randint,choice
myar = ('q','w','e','r','t','y')
for i in range(1,2):  #1
  print(randint(5,6)) #5 or 6
  print(choice(myar))

ar = (1, 2, 3)
print(ar * 3) #(1,2,3,1,2,3,1,2,3)
ar = [1, 2, 3]
print(ar * 3) #[1,2,3,1,2,3,1,2,3]

print(repr('sup\n')) #'sup\n'
print(type('sup\n')) #<class 'str'>

python -c "print('hello'.rjust(10))"
#     hello

#string slice/substring
v = 'sup'
v[-1:]    #'p'
v[-2:-1]  #'u'

i = int(input('Enter a number: '))
if i == 0:
  print('found 0')
elif i == 1:
  print('found 1')
else:
  print('found unknown')

myString = 'Y'
if myString.lower() in ('y', 'yes'):
  print('You have won!')

import re
print(re.compile('my?reg', re.IGNORECASE).search('abcdefghijklmregno'))
#<_sre.SRE_Match object; span=(12, 16), match='mreg'>
https://docs.python.org/3/library/re.html#match-objects

hello = False or True
print(hello,1,2,3, end="", sep="") #True123

def fib(num):
  x, y = 0, 1
  while x < num:
    print(x, end=' ', sep='', flush=True)
    x, y = y, x+y
  print()
fib(200) #0 1 1 2 3 5 8 13 21 34 55 89 144

mylist = ('column 1', 'column 2', 'column 3', 'column 4');
print(' | '.join(mylist[-2:]));

'''This is a comment.
multi-lined :D
'''

def subroutine_name(name=None, whatever=None):
  if name:
    print('your name must be ' + str(name) + '. Interesting.')

ar1 = [1,2,3] #list
ar2 = (1,2,3) #tuple
ar1.insert(0, 'first')
#ar2.insert(0, 'first') ERROR
print(ar1)

myar = [1,2,3,4,5,6]
del myar[0]   #0=>1
del myar[0:1] #0=>None, 1=>2
print(myar)   #[3,4,5,6]
del myar[:]   #now an empty list. (myar.clear())
del myar      #can never access myar again.
myar = [1,2,2,3,3,3]
myar.count(3) #3  IE. "count how many times this value is in the array"

myar = [1,2,3,4,5,6]
del myar[0]
myar.insert(0,1)
del myar[0]
print(myar) #2,3,4,5,6
print(myar.index(6))  #IE. "find location where value=6"
                      #=4

myar       = [0,1,2,3,4,5,6]
myar.pop(2)
print(myar) #[0,1,  3,4,5,6]

myar = [0,1]
myar.extend((2,3))        #IE. "extend the list/array with these fresh values"
myar[len(myar):] = (4,5,6)#IE. (samething)
print(myar)

#does it look like a number?
import numbers
ar = (1,'sz',2.6,'sz3333',3)
for value in ar:
  if isinstance(value, numbers.Number):
    print(str(value) + ' looks like a number')
  else:
    print(value + ' looks like a string')
(6.11111).is_integer() # False.
for value in b'to integers and beyond!':
  print(value)

for n in range(5): #0..4
  print(n)
for n in range(1,10): #1..9
  print(n)
ar = list(range(5))
ar.insert(0, 'first')
print(ar)

key = True
value = False
assert(key is not False and value is not True)
v = 'hello'
assert isinstance(v, str)
assert v.replace('.', '').replace('-', '').replace('_', '').isalnum()

print chr(97) #'a'
from struct import unpack
print(unpack('c', bytes(chr(97), 'ASCII'))) #(b'a',)

var = None
if var == None:
  print('nothing')
if var is None: #preferred!
  print('still nothing')

keys = (1,3,2,4)
for k in keys:
  print(k)
  continue
  break

#like Data::Dumper() and crazzzy syntax :D
myar = [1,
2,3,4,[1],[],
                 3]
print(myar)

mystring = 'hello %d' % 500
print(mystring)
mystring = 'hello {}'.format(501)
print(mystring)

mystring = ('concat'
'this and' 'this')
print(mystring)

if 0 == '':
  print('sup1')
elif '' == False:
  print('sup1.5')
elif 0 == False:
  print('sup2') #DING!!!
else:
  print('sup3')
so I think split and join should be renamed as explode and implode
and we should create the function file_get_contents and file_put_contents
#!/bin/bash

#the first 3 is to get rid of open ports.
#the last 1 is to avoid the screen from being flipped
sudo apt purge cups-daemon avahi-daemon cups-browsed iio-sensor-proxy
sudo apt-get update
sudo apt install atool chromium-browser hexchat php7.2-cli


exit 0



read -p 'fix datetime and hit ENTER' myv
read -p 'turn down the volume and hit ENTER' myv
#REM these are used by wine for wow and diablo 1
rmdir ~/Templates ~/Public ~/Music ~/Videos ~/Pictures 
sudo swapon /dev/sdb2
#cvt 1280 720 60.00
xrandr --newmode 1280x720_60.00 74.50 1280 1344 1472 1664 720 723 728 748 -hsync +vsync
xrandr --addmode eDP-1-1 1280x720_60.00
xrandr --output eDP-1-1 --mode 1280x720_60.00
read -p 'press ENTER' myv
sudo systemctl stop cron
sudo systemctl disable bluetooth
sudo systemctl stop bluetooth
sudo systemctl stop pop-upgrade
sudo apt purge firefox\*
echo enable performance
nvidia-settings #enable performance
cp /media/pop-os/EXTLB/_vimrc ~/.vimrc
cat /media/pop-os/EXTLB/_bashrc >> ~/.bashrc
cp /media/pop-os/EXTLB/youtube-dl ~/
cp /media/pop-os/EXTLB/youtube-search.sh ~/
cp /media/pop-os/EXTLB/echo2.c ~/echo2.c
cp /media/pop-os/EXTLB/gamelist.txt ~/
cp -af /media/pop-os/EXTLB/localhost-httpd-master/* ~/
sudo dpkg -iR /media/pop-os/EXTLB/essential-debs1of2
read -p 'press ENTER for more deb installs' myv
sudo dpkg -iR /media/pop-os/EXTLB/essential-debs2of2
read -p 'press ENTER for more deb installs' myv
sudo dpkg -iR /media/pop-os/EXTLB/ffmpeg-debs

#play WoW
sudo dpkg -iR /media/pop-os/EXTLB/wine1of3-debs
read -p 'press ENTER for more deb installs' myv
sudo dpkg -iR /media/pop-os/EXTLB/wine2of3-debs
sudo dpkg -iR /media/pop-os/EXTLB/wine2of3-debs
read -p 'press ENTER for more deb installs' myv
sudo dpkg -iR /media/pop-os/EXTLB/wine3of3-debs
#sudo dpkg -a --configure
cd '/media/pop-os/EXTLB/WOW_wineprefix/drive_c/Program Files (x86)/Battle.net'
export XMODIFIERS=''
export WINEPREFIX=/media/pop-os/EXTLB/WOW_wineprefix
read -p 'press ENTER to play' myv
WINEDEBUG=-all wine 'C:\\Program Files (x86)\\Battle.net\\Battle.net Launcher.exe'

#play Diablo 1
cd /media/pop-os/EXTLB/DIAB_wineprefix/drive_c/DIAB/Belz
export XMODIFIERS=''
export WINEPREFIX=/media/pop-os/EXTLB/DIAB_wineprefix
read -p 'press ENTER to play' myv
WINEDEBUG=-all wine 'C:\\DIAB\\Belz\\Belzebub.exe'

#play Diablo 2
cd /media/pop-os/EXTLB/D2_wineprefix/drive_c/DiabloII
export XMODIFIERS=''
export WINEPREFIX=/media/pop-os/EXTLB/D2_wineprefix
read -p 'press ENTER to play' myv
WINEDEBUG=-all wine 'Diablo II.exe' -w -direct -txt -3dfx

#Diablo 2 DEV
aunpack -X ~/ /media/pop-os/EXTLB/d2-d2s-tools-dev.tar.gz #(to get your toolbox to edit d2s files)
#includes go programming language
#<add this to .bashrc>
export PATH="$PATH:/home/pop-os/go/bin"
export DIABLO_II_PATH=/media/pop-os/EXTLB/D2_wineprefix/drive_c/DiabloII
export DIABLO_II_CHAR='/media/pop-os/EXTLB/D2_wineprefix/drive_c/users/pop-os/Saved Games/Diablo II/Solomon.d2s'
export WINEPREFIX=/media/pop-os/EXTLB/D2_wineprefix
#</add this to .bashrc>

#play Minecraft
cd
sudo dpkg -iR /media/pop-os/EXTLB/jre-debs
sudo dpkg -i /media/pop-os/EXTLB/Minecraft.deb
ln -s /media/pop-os/EXTLB/dotminecraft .minecraft
read -p 'created link, press ENTER to play' myv
minecraft-launcher

#play Borderlands 2, DOTA 2, CS:GO, Team Fortress 2, Factorio Demo
cd
ln -s /media/pop-os/EXTLB/local_share_aspyr-media .local/share/aspyr-media
ln -s /media/pop-os/EXTLB/local_share_Steam .local/share/Steam
ln -s /media/pop-os/EXTLB/dotsteam .steam
read -p 'made the links, press ENTER' myv
sudo dpkg -i /media/pop-os/EXTLB/steam_latest.deb
read -p 'installed steam, press ENTER to play steam' myv
steam

#play GTA5 <BUGGY AS F>
steam

#get controller working (CONTROLLER IS BROKEN WITH BLUETOOTH)
sudo bash -c 'echo "" >> /etc/sysfs.conf;echo "/module/bluetooth/parameters/disable_ertm=1" >> /etc/sysfs.conf'
sleep 1
sudo systemctl restart sysfsutils
sleep 2
sudo systemctl start bluetooth

#<TODO>
=begin
-all of the array subroutines/functions/methods-to-call
 and all of their other valid names in other programming languages
-same with Math.*
-same with String.*
-same with ANumber.* 
=end
#</TODO>

#<note>these variable names are conventionally proper</note>
my_var = 3.14
my_var2 = true
my_var3 = [ 'wo', 'rl', 'd' ]
my_var4 = 'a string'

puts 'hello'
print my_var3 #<prints>['wo', 'rl', 'd']</prints>
puts '!'
puts my_var2 #<prints>true</prints>

puts "#{my_var2}" #<prints>true</prints>
# <doesn't-work> puts '' + str(my_var2) #true </doesn't-work>
=begin
extra information:
my_var2.to_i (to integer) Unable to convert boolean to integer
my_var2.to_f (to float)
=end
puts '' + my_var2.to_s #<prints>true</prints>
puts '' + my_var4 #<prints>a string</prints>
puts '' + 2.71.to_i.to_s #<prints>2</prints>

#<note><note-idea>the .length function is the same as arrays. this substr() fxns work just like fetching indeces from an array.</note-idea>
puts my_var.to_s.length #<prints>4</prints>
puts my_var.to_s()[0, 2] #IE. .substr(INDEX, LEN=1) where the 2nd argument is the LENGTH <prints>3.</prints>
puts my_var.to_s()[0..1] #IE. .substr(INDEX0, INDEX1)
#</note>
puts my_var.to_s()[0] #<prints>3</prints>
puts my_var.to_s().include? '14' #IE. 'is this substring within this larger string?' <prints>true</prints>

puts my_var.round() #<prints>3</prints>
puts 3.14.round() #<prints>3</prints>
puts 3.54.round() #<prints>4</prints>
puts Math.sqrt(my_var); #<prints>1.772004514666935</prints>

=begin
<sz = STDIO.getLine()>
  sz = gets.chomp
</*>

<ar-functions>
my_ar.sort
my_ar.reverse
my_ar.push('putThisStringInTheArrayAtTheEnd')
my_ar.pop #<note>the last index gets removed forever</note>
my_ar.include? <note>boolean ArrayHasThisInArray(my_ar, szNeedle)</note>
</ar-functions>

<uniq-functions>
function myFunction(_sz='defaultString'){
  return _sz + 'thisIsAppended';
}
function my_function(_sz='defaultString'){
  return _sz + 'thisIsAppended';
}
def my_function(_sz='defaultString'){
  return _sz + 'thisIsAppended';
}
def my_function(_sz='defaultString')
  return _sz + 'thisIsAppended';
end
def my_function(_sz='defaultString')
  return _sz + 'thisIsAppended'
end

<notice>the last function definition is correct</notice>
</uniq-functions>

<if-statements>
var arTruth = true;
if(arTruth && arTruth)
  puts 'we are most definitely true'

ar_truth = true
if ar_truth and ar_truth
  puts 'we are most definitely true'
end

<notice>the last expression is correct</notice>
<note>elsif, and else</note>
<note>< > <= >= == != for numbers and string comparison</note>
</if-statements>


<super-if-statementAKAswitch-statement>
var my_var = 'c';
switch(my_var){
case 'a':
puts('Ayyyy');
break;
case 'b':
puts('Bayyy');
break;
case 'c':
puts('Say');
break;
default:
puts('none of the above');
}

my_var = 'c'
case my_var
when 'a'
puts('Ayyyy')
when 'b'
puts('Bayyy')
when 'c'
puts('Say')
else
puts('none of the above')
end
</super-if-statementAKAswitch-statement>

<hash-arrays>
%my_hash = {
'a' => 'Ayyyy',
'b' => 'Bayy',
'c' => 'Say',
:d => 'Die'
}

my_hash = {
'a' => 'Ayyyy'
'b' => 'Bayy'
'c' => 'Say'
:d => 'Die'
}

my_hash = { #you can use numbers too
'a' => 'Ayyyy',
'b' => 'Bayy',
'c' => 'Say', #and you can access the hash with these strings
:d => 'Die'
}
puts my_hash[:d]
</hash-arrays>

<while-loops>
var i=0;
while i < 5
i++
end
</while-loops>

<for-loops>
<note>all of these are valid</note>
for i in 0..5
puts(i)
end

for i in arList
puts(i)
end

arList.each do |i|
puts(i)
end

5.times do |i|
puts(i)
end
</for-loops>

<ASSERT(false)>
raise 'Exception123' #<note>will give the line number in the src code to the error</note>
</ASSERT(false)>

<OO>
<the-first-one-is-wrong />
class MyClassName
  attr_ :a, :b
  def printName()
    puts 'Name: ' + self.a + ' ' + self.b;
  end
end
c = new MyClassName()
c.a = 'Anonymous'
c.b = 'Pony'
c.printName()

class MyClassName
  attr_accessor :a, :b
  def printName()
    puts 'Name: ' + self.a + ' ' + self.b
  end
end
c = MyClassName.new()
c.a = 'Anonymous'
c.b = 'Pony'
c.printName()
puts 'Name: ' + c.a + ' ' + c.b
</OO>

<OO2>
<first-one-is-wrong />
class MyClassName
  attr_accessor :a, :b
  def MyClassName(_a, _b)
    self.a = _a
    self.b = _b
  end
end
c = MyClassName.new('Bull', 'Shit')
puts c.a + c.b

class MyClassName
  attr_accessor :a, :b
  def initialize(_a, _b)
    @a = _a
    @b = _b
  end
end
c = MyClassName.new('Bull', 'Shit')
puts c.a + c.b
</OO2>

<OO3>
class MyClassName
  attr_accessor :a, :b
  def get_a
    return @a
  end
  def set_a=(_a)
    @a = _a
  end
end
c = MyClassName.new()
c.set_a = 'Bull'
puts c.get_a
</OO3>

<OO4>
class SubClass < SuperClass
#all methods/subroutines are inherited
</OO4>

=end
<webbrowsers>
  brave
  chrome
  chromium
  icecat (older versions if necessary)
  palemoon
  seamonkey
  waterfox
  vivaldi
  yandex
</webbrowsers>
remove light-locker to see if locking the screen doesn't get foiled then
detect if I can change the font size in mousepad after unchecking the Preserve font family/size
#!/usr/bin/php
<?php
# cd $HOME; cat Desktop/*; echo; rm Desktop/*
$a = array(
'hey',
'yo',
'sup',
'wudup',
'ergo',
'zed'
);
for($i=1;$i<=20;$i++) {
   shuffle($a);
   file_put_contents(getenv("HOME") . "/Desktop/".$i.".txt", $a[0]);
}
?>
#!/usr/bin/perl


use warnings;
use strict;

my @characters = qw/0 1 2 3 4 5 6 7 8 9 a b c d e f/;
print 'username: user';
for my $i(1 .. 6){
print $characters[rand @characters];
}

print "\n";
my @characters2 = qw/0 1 2 3 4 5 6 7 8 9 a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z/;
my @special_characters = ('@', '$', '!'); 
print 'password: ';
for my $i(1 .. 13){
print $characters2[rand @characters2];
if(rand() < 0.3){
print $special_characters[rand @special_characters];
}
}
print "\n"
weechat -a -p #disable plugins and auto-join feature

/plugin load irc #load IRC plugin

/nick ****
/server add freenode chat.freenode.net
/connect freenode
/msg NickServ identify ****



/set irc.server_default.nicks ****
/set irc.server_default.username k
/set irc.server_default.msg_part ""
/set irc.server_default.msg_quit ""
/server add freenode irc.freenode.net -autoconnect

/set irc.server_default.capabilities "account-notify,away-notify,cap-notify,multi-prefix,server-time"

#1280x720  720p resolution
cvt 800 600 60 #copy and paste output:
xrandr --newmode 800x600_60.00 \
38.25 800 832 912 1024 600 603 607 624 -hsync +vsync
xrandr --addmode eDP-1-1 800x600_60.00
xrandr --output eDP-1-1 --mode 800x600_60.00

#for my gaming computer:
xrandr --newmode 1280x720_60.00 74.50  1280 1344 1472 1664  720 723 728 748 -hsync +vsync
xrandr --addmode eDP-1-1 1280x720_60.00
xrandr --output eDP-1-1 --mode 1280x720_60.00
