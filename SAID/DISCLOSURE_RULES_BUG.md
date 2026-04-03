# Bug Report — DISCLOSURE_RULES.json

**File:** `SAID/DISCLOSURE_RULES.json`  
**Status:** OPEN — do not wire into any live pipeline until resolved  
**Severity:** High — notebooks leak as public under first-match evaluation

## The Bug

Rule 2 (`*.json = public`) and Rule 3 (`notebooks/ = restricted`) conflict.

Jupyter notebooks (`.ipynb`) are JSON. Any notebook exported or saved as `.json`
hits Rule 2 first and is classified **public** before Rule 3 can restrict it.

Even `.ipynb` files inside a `notebooks/` directory are at risk if the engine
checks extension rules before directory rules.

**No precedence logic is defined in the file.** First-match-wins is the standard
default in most rule engines — meaning Rule 2 wins over Rule 3 every time for
any JSON file inside a notebooks directory.

## Affected scenario

```
notebooks/analysis.json   → Rule 2 fires (*.json = public) ← WRONG
notebooks/analysis.ipynb  → Rule 3 fires (notebooks/ = restricted) ← correct
```

## Fix options

1. **Narrow the json rule** — exclude notebook paths:
   ```json
   { "pattern": "(?<!notebooks?/.*)\\.(json)$", "level": "public" }
   ```

2. **Add explicit ipynb rule before the json rule:**
   ```json
   { "pattern": "\\.(ipynb)$", "level": "restricted" }
   ```

3. **Define precedence** — add a `"priority"` field and make directory rules
   win over extension rules.

4. **Most-specific-wins** — refactor the engine to prefer longer/more-specific
   patterns over shorter ones.

## Resolution

**Fixed** — directory rules moved above extension rules. First-match-wins now means
`notebooks/`, `models/`, `secrets/`, `raw_data/` all fire before any extension rule.
Also added `ipynb` explicitly to the json rule as a belt-and-suspenders measure.

**Status: CLOSED**

## Origin

Recovered from `backups/claude/fixes/DISCLOSURE_RULES.json` (ChatGPT artifact,
circa Jul 2025). Not currently wired into any live system — must be reviewed
before activation.
