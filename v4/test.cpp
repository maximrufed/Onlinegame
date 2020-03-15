#include <bits/stdc++.h>

using namespace std;

signed main() {
	ios::sync_with_stdio(0);
	cin.tie(0);
	cout.tie(0);
	ifstream in("map.txt");
	int n;
	in >> n;
	n--;
	ofstream out("turn.txt");
	out << n << "\n";
    return 0;
}

