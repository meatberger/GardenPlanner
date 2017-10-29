##
## Auto Generated makefile by CodeLite IDE
## any manual changes will be erased      
##
## Debug
ProjectName            :=Garden
ConfigurationName      :=Debug
WorkspacePath          :=/opt/lampp/htdocs/GardenPlanner/Garden
ProjectPath            :=/opt/lampp/htdocs/GardenPlanner/Garden/Garden
IntermediateDirectory  :=./Debug
OutDir                 := $(IntermediateDirectory)
CurrentFileName        :=
CurrentFilePath        :=
CurrentFileFullPath    :=
User                   :=Andrew Berger
Date                   :=28/10/17
CodeLitePath           :=/home/berger/.codelite
LinkerName             :=/usr/bin/x86_64-linux-gnu-g++
SharedObjectLinkerName :=/usr/bin/x86_64-linux-gnu-g++ -shared -fPIC
ObjectSuffix           :=.o
DependSuffix           :=.o.d
PreprocessSuffix       :=.i
DebugSwitch            :=-g 
IncludeSwitch          :=-I
LibrarySwitch          :=-l
OutputSwitch           :=-o 
LibraryPathSwitch      :=-L
PreprocessorSwitch     :=-D
SourceSwitch           :=-c 
OutputFile             :=$(IntermediateDirectory)/$(ProjectName)
Preprocessors          :=
ObjectSwitch           :=-o 
ArchiveOutputSwitch    := 
PreprocessOnlySwitch   :=-E
ObjectsFileList        :="Garden.txt"
PCHCompileFlags        :=
MakeDirCommand         :=mkdir -p
LinkOptions            :=  
IncludePath            :=  $(IncludeSwitch). $(IncludeSwitch). 
IncludePCH             := 
RcIncludePath          := 
Libs                   := 
ArLibs                 :=  
LibPath                := $(LibraryPathSwitch). 

##
## Common variables
## AR, CXX, CC, AS, CXXFLAGS and CFLAGS can be overriden using an environment variables
##
AR       := /usr/bin/x86_64-linux-gnu-ar rcu
CXX      := /usr/bin/x86_64-linux-gnu-g++
CC       := /usr/bin/x86_64-linux-gnu-gcc
CXXFLAGS :=  -g -O0 -Wall $(Preprocessors)
CFLAGS   :=  -g -O0 -Wall $(Preprocessors)
ASFLAGS  := 
AS       := /usr/bin/x86_64-linux-gnu-as


##
## User defined environment variables
##
CodeLiteDir:=/usr/share/codelite
Objects0=$(IntermediateDirectory)/main.cpp$(ObjectSuffix) $(IntermediateDirectory)/Classes_Overlaps.cpp$(ObjectSuffix) $(IntermediateDirectory)/Classes_Shape.cpp$(ObjectSuffix) $(IntermediateDirectory)/Classes_clipper.cpp$(ObjectSuffix) 



Objects=$(Objects0) 

##
## Main Build Targets 
##
.PHONY: all clean PreBuild PrePreBuild PostBuild MakeIntermediateDirs
all: $(OutputFile)

$(OutputFile): $(IntermediateDirectory)/.d $(Objects) 
	@$(MakeDirCommand) $(@D)
	@echo "" > $(IntermediateDirectory)/.d
	@echo $(Objects0)  > $(ObjectsFileList)
	$(LinkerName) $(OutputSwitch)$(OutputFile) @$(ObjectsFileList) $(LibPath) $(Libs) $(LinkOptions)

MakeIntermediateDirs:
	@test -d ./Debug || $(MakeDirCommand) ./Debug


$(IntermediateDirectory)/.d:
	@test -d ./Debug || $(MakeDirCommand) ./Debug

PreBuild:


##
## Objects
##
$(IntermediateDirectory)/main.cpp$(ObjectSuffix): main.cpp $(IntermediateDirectory)/main.cpp$(DependSuffix)
	$(CXX) $(IncludePCH) $(SourceSwitch) "/opt/lampp/htdocs/GardenPlanner/Garden/Garden/main.cpp" $(CXXFLAGS) $(ObjectSwitch)$(IntermediateDirectory)/main.cpp$(ObjectSuffix) $(IncludePath)
$(IntermediateDirectory)/main.cpp$(DependSuffix): main.cpp
	@$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) -MG -MP -MT$(IntermediateDirectory)/main.cpp$(ObjectSuffix) -MF$(IntermediateDirectory)/main.cpp$(DependSuffix) -MM main.cpp

$(IntermediateDirectory)/main.cpp$(PreprocessSuffix): main.cpp
	$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) $(PreprocessOnlySwitch) $(OutputSwitch) $(IntermediateDirectory)/main.cpp$(PreprocessSuffix) main.cpp

$(IntermediateDirectory)/Classes_Overlaps.cpp$(ObjectSuffix): Classes/Overlaps.cpp $(IntermediateDirectory)/Classes_Overlaps.cpp$(DependSuffix)
	$(CXX) $(IncludePCH) $(SourceSwitch) "/opt/lampp/htdocs/GardenPlanner/Garden/Garden/Classes/Overlaps.cpp" $(CXXFLAGS) $(ObjectSwitch)$(IntermediateDirectory)/Classes_Overlaps.cpp$(ObjectSuffix) $(IncludePath)
$(IntermediateDirectory)/Classes_Overlaps.cpp$(DependSuffix): Classes/Overlaps.cpp
	@$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) -MG -MP -MT$(IntermediateDirectory)/Classes_Overlaps.cpp$(ObjectSuffix) -MF$(IntermediateDirectory)/Classes_Overlaps.cpp$(DependSuffix) -MM Classes/Overlaps.cpp

$(IntermediateDirectory)/Classes_Overlaps.cpp$(PreprocessSuffix): Classes/Overlaps.cpp
	$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) $(PreprocessOnlySwitch) $(OutputSwitch) $(IntermediateDirectory)/Classes_Overlaps.cpp$(PreprocessSuffix) Classes/Overlaps.cpp

$(IntermediateDirectory)/Classes_Shape.cpp$(ObjectSuffix): Classes/Shape.cpp $(IntermediateDirectory)/Classes_Shape.cpp$(DependSuffix)
	$(CXX) $(IncludePCH) $(SourceSwitch) "/opt/lampp/htdocs/GardenPlanner/Garden/Garden/Classes/Shape.cpp" $(CXXFLAGS) $(ObjectSwitch)$(IntermediateDirectory)/Classes_Shape.cpp$(ObjectSuffix) $(IncludePath)
$(IntermediateDirectory)/Classes_Shape.cpp$(DependSuffix): Classes/Shape.cpp
	@$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) -MG -MP -MT$(IntermediateDirectory)/Classes_Shape.cpp$(ObjectSuffix) -MF$(IntermediateDirectory)/Classes_Shape.cpp$(DependSuffix) -MM Classes/Shape.cpp

$(IntermediateDirectory)/Classes_Shape.cpp$(PreprocessSuffix): Classes/Shape.cpp
	$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) $(PreprocessOnlySwitch) $(OutputSwitch) $(IntermediateDirectory)/Classes_Shape.cpp$(PreprocessSuffix) Classes/Shape.cpp

$(IntermediateDirectory)/Classes_clipper.cpp$(ObjectSuffix): Classes/clipper.cpp $(IntermediateDirectory)/Classes_clipper.cpp$(DependSuffix)
	$(CXX) $(IncludePCH) $(SourceSwitch) "/opt/lampp/htdocs/GardenPlanner/Garden/Garden/Classes/clipper.cpp" $(CXXFLAGS) $(ObjectSwitch)$(IntermediateDirectory)/Classes_clipper.cpp$(ObjectSuffix) $(IncludePath)
$(IntermediateDirectory)/Classes_clipper.cpp$(DependSuffix): Classes/clipper.cpp
	@$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) -MG -MP -MT$(IntermediateDirectory)/Classes_clipper.cpp$(ObjectSuffix) -MF$(IntermediateDirectory)/Classes_clipper.cpp$(DependSuffix) -MM Classes/clipper.cpp

$(IntermediateDirectory)/Classes_clipper.cpp$(PreprocessSuffix): Classes/clipper.cpp
	$(CXX) $(CXXFLAGS) $(IncludePCH) $(IncludePath) $(PreprocessOnlySwitch) $(OutputSwitch) $(IntermediateDirectory)/Classes_clipper.cpp$(PreprocessSuffix) Classes/clipper.cpp


-include $(IntermediateDirectory)/*$(DependSuffix)
##
## Clean
##
clean:
	$(RM) -r ./Debug/


