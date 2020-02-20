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
