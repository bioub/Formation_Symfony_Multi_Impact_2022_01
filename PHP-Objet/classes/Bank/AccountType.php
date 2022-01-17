<?php

namespace MultiImpact\Bank;

enum AccountType: string
{
    case COMPTE_COURANT = 'Compte Courant';
    case LIVRET_A = 'Livret A';
}