<?php

namespace FattureInCloud\ApiFilter\Filter;

abstract class Operator
{
    const EQ = "=";
    const GT = ">";
    const GTE = ">=";
    const LT = "<";
    const LTE = "<=";
    const NEQ = "<>";
    const LIKE = "like";
    const CONTAINS = "contains";
    const STARTS_WITH = "starts with";
    const ENDS_WITH = "ends with";
}
