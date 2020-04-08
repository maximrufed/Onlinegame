#include <bits/stdc++.h>

#define pb push_back
#define ll long long
#define ld long double

using namespace std;

int n;
vector<vector<int>> a, b, c;
int t, x, y;

void read() {
	cin >> n;
	a.resize(n, vector<int>(n, 0));
	b.resize(n, vector<int>(n + 1, 0));
	c.resize(n + 1, vector<int>(n, 0));
	for (int i = 0; i < n; i++) {
		for (int j = 0; j < n; j++) {
			cin >> a[i][j];
		}
	}
	for (int i = 0; i < n; i++) {
		for (int j = 0; j < n + 1; j++) {
			cin >> b[i][j];
		}
	}
	for (int i = 0; i < n + 1; i++) {
		for (int j = 0; j < n; j++) {
			cin >> c[i][j];
		}
	}
}

void solve() {
	for (int i = 0; i < n; i++) {
		for (int j = 0; j < n + 1; j++) {
			if (b[i][j] == 0) {
				t = 1;
				x = i + 1;
				y = j + 1;
				return;
			}
		}
	}
	for (int i = 0; i < n + 1; i++) {
		for (int j = 0; j < n; j++) {
			if (c[i][j] == 0) {
				t = 2;
				x = i + 1;
				y = j + 1;
				return;
			}
		}
	}
}

void write() {
	cout << t << " " << x << " " << y << "\n";
}

signed main() {
	ios::sync_with_stdio(0);
	cin.tie(0);
	cout.tie(0);
	freopen("map.txt", "rt", stdin);
	freopen("turn.txt", "wt", stdout);
	read();
	solve();
	write();
	
    return 0;
}

