<?php

namespace FattureInCloud\ApiFilter\Filter;

abstract class PatternOperator
{
    const LIKE = "like";
    const CONTAINS = "contains";
    const STARTS_WITH = "starts with";
    const ENDS_WITH = "ends with";
}