# GardenPlanner
An open-source garden-planning website for Pellissippi State
written in php 7, html 5, CSS 3, and C++

For logged hours on this project, please see Volunteer Hours.xlsx (excel spreadsheet)

See Changelog.docx for a description of the work being done

Browse in the Plans folder to see my thought process through solving the overlap algorithm

A Binary file will detect the overlap. The C++ for it is in the Garden/Garden/ directory as a codelite project

The php and html and website code for the garden project are in the same workspace.

Pass in the arguments in the form of:

Arg1,2: (int) shape1 and two types (0 for circle, 1 for ellipse, and 2 for any other polygon)

Arg3,4: (int) shape1 and two coordinates ("x,y|x,y|x,y") for a polygon, 

("origin x, origin y|radius") for circles. ("origin x, origin y|radius a:radius b") for ellipses

exit code is 0 for no overlap, 1 if two circles overlapped.

Otherwise, the program will also output the path of the "solution". That is, the path where the two shapes intersect
                                                                                                                                             
