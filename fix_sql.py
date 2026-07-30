import re

input_file = "chhornghotpotsoup.sql"
output_file = "chhornghotpotsoup_fixed.sql"

with open(input_file, "r", encoding="utf-8") as f:
    sql = f.read()

# ----------------------------
# Find all ALTER TABLE ADD PRIMARY KEY
# ----------------------------
primary_keys = {}

pattern = re.compile(
    r"ALTER TABLE\s+`([^`]+)`\s+ADD PRIMARY KEY\s+\(`([^`]+)`\);",
    re.IGNORECASE | re.MULTILINE,
)

for table, column in pattern.findall(sql):
    primary_keys[table] = column

# Remove ALTER TABLE ADD PRIMARY KEY
sql = pattern.sub("", sql)

# ----------------------------
# Fix CREATE TABLE
# ----------------------------

create_pattern = re.compile(
    r"CREATE TABLE\s+`([^`]+)`\s*\((.*?)\)\s*ENGINE=",
    re.DOTALL | re.IGNORECASE,
)


def fix_table(match):
    table = match.group(1)
    body = match.group(2)

    if table not in primary_keys:
        return match.group(0)

    pk = primary_keys[table]

    lines = body.splitlines()

    new_lines = []

    for line in lines:
        if re.search(rf"`{pk}`\s+bigint.*NOT NULL", line):
            if "AUTO_INCREMENT" not in line.upper():
                line = line.replace("NOT NULL", "NOT NULL AUTO_INCREMENT")
        new_lines.append(line)

    # Remove last comma
    while new_lines[-1].strip() == "":
        new_lines.pop()

    if new_lines[-1].strip().endswith(","):
        new_lines[-1] = new_lines[-1].rstrip(",")

    new_lines.append(f"  PRIMARY KEY (`{pk}`)")

    body = ",\n".join(new_lines)

    return f"CREATE TABLE `{table}` (\n{body}\n) ENGINE="


sql = create_pattern.sub(fix_table, sql)

# ----------------------------
# Remove ALTER TABLE AUTO_INCREMENT
# ----------------------------

sql = re.sub(
    r"ALTER TABLE\s+`[^`]+`\s+MODIFY\s+`id`.*?AUTO_INCREMENT=\d+;",
    "",
    sql,
    flags=re.DOTALL | re.IGNORECASE,
)

with open(output_file, "w", encoding="utf-8") as f:
    f.write(sql)

print("Done!")
print("Created:", output_file)
