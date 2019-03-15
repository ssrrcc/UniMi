# CORSO INGEGNERIA DEL SOFTWARE A.A. 2018/19

## LABORATORIO 1

Ogni coppia di studenti procede alla compilazione del [form](https://carlobellettini.typeform.com/to/o42lsM) per la rilevazione delle presenze.

### Processo

Una volta importato il progetto, il gruppo implementa secondo la metodologia **TDD** le specifiche riportate di seguito; in maggior dettaglio, ripete i
passi seguenti fino ad aver implementato tutte le funzionalità richieste:

* ripetere fino ad esaurimento dei test:
    * scommentare un nuovo test, 
    * [ROSSO] aggiungere, se necessario, il codice utile ad eliminare errori di compilazione,
    * [VERDE] aggiungere il codice necessario a far eseguire il test con successo,
    * [REFACTORING] procedere, se necessario, al *refactoring* del codice per migliorare la soluzione funzionante.

### Specifica dei requisiti

Scopo dell'esercitazione è creare un programma Java per la conversione di numeri interi positivi (<4000) in/da [formato Romano](https://en.wikipedia.org/wiki/Roman_numerals).
Nello specifico, i requisiti funzionali vengono forniti attraverso una serie di test di unità presenti presenti nel file [RomanNumeralsTest.java](src/test/java/it/unimi/di/sweng/lab01/RomanNumeralsTest.java).
Il gruppo procede considerando un singolo test alla volta, come descritto nella sezione *Processo*.

Il software implementato dovrà essere **corretto** rispetto alla specifica dei requisiti, e **manutenibile**.
In questo senso il gruppo dovrà adottare uno stile di programmazione orientato agli oggetti usando le principali convenzioni della pragrammazione Java.
Inoltre, prestare attenzione ad evitare *codice duplicato* e *poco leggibile*.

La *leggibilità* e la *manutenibilità* del software sono attributi di qualità di cui il gruppo deve occuparsi esplicitamente durante la fase di *refactoring*.