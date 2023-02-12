# PHP Try{} data types
## Experiment findings - Various variables echoed as different data types
Results

|        |  5  |  1.5  | "Vsichni..." | true | [12, 5] |
|:------:|:---:|:-----:|:------------:|:----:|:-------:|
|   INT  |  5  |   1   |       ❌      |   1  |    ❌    |
|  FLOAT |  5  |  1.5  |       ❌      |   1  |    ❌    |
| STRING | "5" | "1.5" | "Vsichni..." |  "1" |    ❌    |
|  BOOL  |  1  |   1   |       1      |   1  |    ❌    |
|  ARRAY |  ❌  |   ❌   |       ❌      |   ❌  |  Array  |
