package com.moventes.com.imdb;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONException;

import java.io.IOException;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

public class ListActivity extends AppCompatActivity {

    private MoviesAdapter adapter;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        // on définit le layout de l'activité, cad son contenu
        setContentView(R.layout.list_activity);

        // on récupère la liste depuis le layout à l'aide de son id
        ListView list = findViewById(R.id.list);

        final MovieAccessor accessor = new MovieAccessor();

        ArrayList<Movie> movies = new ArrayList<Movie>();

        if (savedInstanceState != null && savedInstanceState.containsKey("MOVIES")) {
            movies = savedInstanceState.getParcelableArrayList("MOVIES");
        }

        // on crée un adapter de type MoviesAdapter
        adapter = new MoviesAdapter(this,
                R.layout.item_layout, movies);

        // on affecte l'adapter à la liste
        list.setAdapter(adapter);

        // on branche un onItemClickListener
        list.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view,
                                    int position, long id) {
                Intent intent = new Intent(ListActivity.this, DetailsActivity.class);
                intent.putExtra("MOVIE_ID", adapter.getData().get(position).getId());
                ListActivity.this.startActivity(intent);
            }
        });

        final EditText search = findViewById(R.id.input);
        Button submit = findViewById(R.id.submit);

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    // update data in our adapter
                    adapter.getData().clear();
                    adapter.getData().addAll(accessor.getMoviesByTitle(search.getText().toString()));
                    // fire the event
                    adapter.notifyDataSetChanged();
                } catch (IOException | InterruptedException | ExecutionException | JSONException e) {
                    Log.e("ERROR", e.getMessage());
                    Toast.makeText(ListActivity.this, "An error occurred", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle item selection
        switch (item.getItemId()) {
            case R.id.favorites:
                Intent intent = new Intent(ListActivity.this,
                        FavoritesActivity.class);
                ListActivity.this.startActivity(intent);
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    @Override
    protected void onSaveInstanceState (Bundle outState) {
        super.onSaveInstanceState(outState);
        outState.putParcelableArrayList("MOVIES", adapter.getData());
    }

}
