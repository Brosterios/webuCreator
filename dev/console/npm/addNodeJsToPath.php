<?php

use bin\webu\IO;

const DS = DIRECTORY_SEPARATOR;
IO::execInDir('export PATH=$PATH:'.ROOT.DS."vendor".DS."nodejs".DS."nodejs", ROOT);
IO::execInDir('export PATH=$PATH:'.ROOT.DS."vendor".DS."nodejs".DS."nodejs".DS."bin", ROOT);
IO::execInDir('export PATH=$PATH:'.ROOT.DS."vendor".DS."bin", ROOT);